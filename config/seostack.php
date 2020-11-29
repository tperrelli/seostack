<?php

return [
    /**
     * some boostrap layout configuration
     */
    'layout' => [
        /**
         * bootstrap's main column class nem
         */
        'main_column_class' => 'col-md-12'
    ],
    
    /**
     * database configuration
     */
    'database' => [
        /**
         * main seo table name
         */
        'seo_table' => 'seo_pages',
        /**
         * seo images table name
         */
        'seo_images_table' => 'seo_page_images'
    ],

    /**
     * storage configuration
     */
    'storage' => [
        /**
         * storage driver
         */
        'driver' => 'public',
        /**
         * prefix definition to be set image url
         */
        'prefix' => 'storage',
        /**
         * folder which image will be sabed
         */
        'folder' => 'seostack'
    ]
];