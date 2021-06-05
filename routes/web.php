<?php

$group = [
    'prefix'     => config('seostack.storage.prefix'),
    'middleware' => ['web'],
    'namespace'  => 'Tperrelli\SeoStack\Controllers',
];

Route::group($group, function() {
    Route::get('seostack/{image}', 'SeoPageMetaController@image');
});
