<?php namespace Vdomah\Gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVdomahGalleryGallerytypes extends Migration
{
    public function up()
    {
        Schema::create('vdomah_gallery_gallerytypes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255);
        });

        Schema::table('vdomah_gallery_galleries', function($table)
        {
            $table->integer('type_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vdomah_gallery_gallerytypes');

        Schema::table('vdomah_gallery_galleries', function($table)
        {
            $table->dropColumn('type_id');
        });
    }
}
