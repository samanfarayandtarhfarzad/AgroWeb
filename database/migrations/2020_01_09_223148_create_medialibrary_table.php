<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedialibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medialibrary', function (Blueprint $table) {
            $table->mediumInteger('medialibrary_id')->autoIncrement();
            $table->string('file_name', 255)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('file_address', 255)->charset('utf8')->collation('utf8_unicode_ci');
            $table->tinyInteger('media_type')->nullable();
            $table->bigIncrements('user_id')->nullable()->autoIncrement(false);
            $table->string('description', 255)->charset('utf8')->collation('utf8_unicode_ci');
            $table->boolean('used_in_content_group')->default(0)->autoIncrement(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medialibrary');
    }
}
