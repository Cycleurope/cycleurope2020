<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTables extends Migration
{
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->timestamp('publish_start_date')->nullable();
            $table->timestamp('publish_end_date')->nullable();
            $table->integer('position')->unsigned()->nullable();
        });

        // remove this if you're not going to use any translated field, ie. using the HasTranslation trait. If you do use it, create fields you want translatable in this table instead of the main table above. You do not need to create fields in both tables.
        Schema::create('slide_translations', function (Blueprint $table) {

            createDefaultTranslationsTableFields($table, 'slide');
            $table->string('heading', 200)->nullable();
            $table->string('subheading', 200)->nullable();
            $table->string('link', 200)->nullable();
            $table->string('link_label', 200)->nullable();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('slide_translations');
        Schema::dropIfExists('slides');
    }
}
