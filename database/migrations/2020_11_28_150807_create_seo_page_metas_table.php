<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoPageMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_page_metas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('caption', 255);
            $table->string('src', 255);
            $table->string('type', 50)->default('general');
            $table->bigInteger('seo_page_id')->unsigned();
            $table->foreign('seo_page_id')->references('id')->on('seo_pages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_page_metas');
    }
}
