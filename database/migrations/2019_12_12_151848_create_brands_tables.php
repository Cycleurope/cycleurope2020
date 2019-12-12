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

        // remove this if you're not going to use any translated field, ie. using the HasTranslation trait. If you do use it, create fields you want translatable in this table instead of the main table above. You do not need to create fields in both tables.
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
