<?php namespace Uttapong\S3videouploader\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUttapongS3videouploader extends Migration
{
    public function up()
    {
        Schema::table('uttapong_s3videouploader_', function($table)
        {
            $table->text('thumbnail')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('uttapong_s3videouploader_', function($table)
        {
            $table->dropColumn('thumbnail');
        });
    }
}
