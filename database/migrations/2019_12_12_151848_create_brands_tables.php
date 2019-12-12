<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandsTables extends Migration
{
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('brand_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'brand');
            $table->string('display_name')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('brand_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'brand');
        });

    }

    public function down()
    {
        Schema::dropIfExists('brand_translations');
        Schema::dropIfExists('brand_slugs');
        Schema::dropIfExists('brands');
    }
}
