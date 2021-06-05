<?php

namespace Tperrelli\SeoStack\Controllers;

use Illuminate\Http\Request;

class SeoPageMetaController
{
    public function image(Request $request, $id)
    {
        $seoMeta = SeoMeta::findOrFail($id);

        dd($seoMeta);
    }
}