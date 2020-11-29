<?php

namespace Tperrelli\SeoStack;

use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

use Tperrelli\SeoStack\Models\SeoPage;
use Tperrelli\SeoStack\Models\SeoPageImage;

class SeoStack
{
    protected $app;

    public function __construct(Application $app) 
    {
        $this->app = $app;
    }

    public function save(Model $model)
    {   
        $seoPage = SeoPage::firstOrNew([
            'title'       => $this->app->request->get('seo_title') ?? '-',
            'description' => $this->app->request->get('seo_description') ?? '-',
            'url'         => $this->app->request->get('seo_url') ?? url('/'),
            'allow_index' => $this->app->request->get('allow_index') ?? false,
            'object'      => get_class($model),
            'object_id'   => $model->getKey(),
            'user_id'     => $this->app->auth->user() ? $this->app->auth->user()->id : 0
        ]);

        if ($seoPage->save() === true && $this->app->request->has('seo_metas')) {
            foreach ($this->app->request->get('seo_metas') as $meta) {
                $hasFile = $this->app->request->hasFile('seo_metas.'.$meta['type'].'.image');
                if ($hasFile) $this->upload($seoPage, $meta);
            }
        }

        return $seoPage;
    }

    private function upload(Model $model, $meta) 
    {
        $driver = $this->app->config->get('seostack.storage.driver');
        $folder = $this->app->config->get('seostack.storage.folder');
        $prefix = $this->app->config->get('seostack.storage.prefix');

        $type  = $meta['type'];
        $image = $this->app->request->file('seo_metas.'.$type.'.image');
        $path  = $image->store($folder, $driver);
        $src   = asset($prefix . '/' . $path);

        $title   = ($type === 'general') ? $model->title : $meta['title'];
        $caption = ($type === 'general') ? $model->description : $meta['description'];

        SeoPageImage::firstOrCreate([
            'title'       => $title,
            'src'         => $src,
            'caption'     => $caption,
            'type'        => $type,
            'seo_page_id' => $model->id
        ]);
    }

    public function generate()
    {
        return view('seostack::seo-pages.create')->render();
    }

    public function delete() {}

    public function layout($config)
    {
        return $this->app->config->get('seostack.layout.'.$config);
    }
}