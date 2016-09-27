<?php namespace Vdomah\Gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVdomahGalleryGalleries extends Migration
{
    public function up()
    {
        Schema::create('vdomah_gallery_galleries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->integer('status')->default(1);
            $table->integer('cover_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vdomah_gallery_galleries');
    }
}
