<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterMenuItemsTables extends Migration
{
    public function up()
    {
        Schema::create('footer_menu_items', function (Blueprint $table) {

            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();   
            $table->string('type')->nullable();    
            $table->string('url_link')->nullable();    
            $table->integer('position')->unsigned()->nullable();
            $table->bigInteger('page_id')->unsigned()->nullable();
            $table->nestedSet();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('footer_menu_items');
    }
}
