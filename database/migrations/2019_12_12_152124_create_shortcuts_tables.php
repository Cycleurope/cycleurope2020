<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShortcutsTables extends Migration
{
    public function up()
    {
        Schema::create('shortcuts', function (Blueprint $table) {
            
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('shortcut_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'shortcut');
            $table->string('display_title')->nullable();
        });

    }

    public function down()
    {
        Schema::dropIfExists('shortcut_translations');
        Schema::dropIfExists('shortcuts');
    }
}
