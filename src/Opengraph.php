<?php

namespace Tperrelli\SeoStack;

use Tperrelli\SeoStack\Models\SeoPageMeta;

class Opengraph
{
    public function generate(SeoPageMeta $seoPageMeta)
    {
        
        // <meta property="og:locale" content="pt_BR" />
        // <meta property="og:type" content="article" />
        // <meta property="og:title" content="facebook title" />
        // <meta property="og:description" content="facebook desc" />
        // <meta property="og:url" content="http://wordpress.test/meu-post/" />
        // <meta property="og:site_name" content="wordpress" />
        // <meta property="article:published_time" content="2020-12-01T10:47:54+00:00" />
        // <meta property="article:modified_time" content="2020-12-04T12:31:45+00:00" />
        // <meta property="og:image" content="http://wordpress.test/wp-content/uploads/2020/12/Captura-de-Tela-2020-10-17-às-10.20.26.png" />
        // <meta property="og:image:width" content="665" />
        // <meta property="og:image:height" content="149" />

        // og:locale
        // og:type
        // article:published_time
        // article:modified_time
        // og:image:width
        // og:image:height
    
        $properties = [
            'title', 'description', 'url', 'site_name', 'image'
        ];

        $html = [];
        $html[] = "<meta property=\"og:locale\" content=\"pt_BR\" />";
        $html[] = "<meta property=\"og:title\" content=\"$seoPageMeta->title\" />";
        $html[] = "<meta property=\"og:description\" content=\"$seoPageMeta->description\" />";
        $html[] = "<meta property=\"og:url\" content=\"$seoPageMeta->seoPage->url\" />";
        $html[] = "<meta property=\"og:image\" content=\"$seoPageMeta->seoPage->url\" />";
        
    }    
}