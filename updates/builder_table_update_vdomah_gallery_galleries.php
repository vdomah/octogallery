<?php namespace Vdomah\Gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVdomahGalleryGalleries extends Migration
{
    public function up()
    {
        Schema::table('vdomah_gallery_galleries', function($table)
        {
            $table->integer('type_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('vdomah_gallery_galleries', function($table)
        {
            $table->integer('type_id')->nullable(false)->change();
        });
    }
}
