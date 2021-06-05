<?php

namespace Tperrelli\SeoStack;

use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

use Tperrelli\SeoStack\Twitter;
use Tperrelli\SeoStack\Opengraph;
use Tperrelli\SeoStack\Models\SeoPage;
use Tperrelli\SeoStack\Models\SeoPageMeta;

class SeoStack
{
    protected $app;

    public function __construct(Application $app) 
    {
        $this->app = $app;
    }

    public function save(Model $model)
    {   
        $seoPage = SeoPage::firstOrNew(
            [
                'title' => $this->app->request->get('seo_title') ?? '-',
                'url'   => $this->app->request->get('seo_url') ?? '/',
            ],
            [
                'title'       => $this->app->request->get('seo_title') ?? '-',
                'description' => $this->app->request->get('seo_description') ?? '-',
                'url'         => $this->app->request->get('seo_url') ?? '/',
                'allow_index' => $this->app->request->get('allow_index') ?? false,
                'object'      => get_class($model),
                'object_id'   => $model->getKey(),
                'user_id'     => $this->app->auth->user() ? $this->app->auth->user()->id : 0
            ]
        );

        if ($seoPage->save() === true && $this->app->request->has('seo_metas')) {
            foreach ($this->app->request->get('seo_metas') as $meta) {
                $hasFile = $this->app->request->hasFile('seo_metas.'.$meta['type'].'.image');
                if ($seoPage->wasRecentlyCreated == false && $hasFile == true) $this->deletePageMeta($seoPage);
                if ($hasFile) $this->savePageMeta($seoPage, $meta);
            }
        }

        return $seoPage;
    }

    private function savePageMeta(Model $model, $meta) 
    {
        $driver = $this->app->config->get('seostack.storage.driver');
        $folder = $this->app->config->get('seostack.storage.folder');
        $prefix = $this->app->config->get('seostack.storage.prefix');

        $type  = $meta['type'];
        $image = $this->app->request->file('seo_metas.'.$type.'.image');
        $path  = $image->store($folder, $driver);
        $src   = $prefix . '/' . $path;

        $title   = ($type === 'general') ? $model->title : $meta['title'];
        $caption = ($type === 'general') ? $model->description : $meta['description'];

        SeoPageMeta::firstOrCreate([
            'title'       => $title,
            'src'         => $src,
            'caption'     => $caption,
            'type'        => $type,
            'seo_page_id' => $model->id
        ]);
    }

    private function deletePageMeta(Model $model) 
    {
        if (!is_null($model->image)) {
            $driver = $this->app->config->get('seostack.storage.driver');
            $folder = $this->app->config->get('seostack.storage.folder');
            $path   = $driver . '/' . $folder;
            
            $file = explode("/", $model->image->src);
            $file = end($file);
            
            $exists = $this->app->filesystem->exists($path . '/' . $file);
            if ($exists == true) {
                $this->app->filesystem->delete($path . '/' . $file);
                $model->image->delete();
            }
        }
    }

    public function generate()
    {
        return view('seostack::seo-pages.create')->render();
    }

    private function opengraph()
    {
        return $this->app->make(Opengraph::class);
    }

    private function twitter()
    {
        return $this->app->make(Twitter::class);
    }

    public function generateTags($url, $minify = false)
    {
        $seoPage = SeoPage::where('url', $url)->first();

        $html = [];
        if (!is_null($seoPage)) {
            
            //title
            $html[] = "<title class=\"notranslate\">$seoPage->title</title>";
            
            //description
            $html[] = "<meta name=\"description\" content=\"$seoPage->description\">";

            //canonical
            $html[] = "<link rel=\"canonical\" href=\"$seoPage->url\">";

            if (!is_null($seoPage->image)) {
                
            }
        }

        return ($minify) ? implode('', $html) : implode(PHP_EOL, $html);
    }

    public function layout($config)
    {
        return $this->app->config->get('seostack.layout.'.$config);
    }
}