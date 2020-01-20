<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->tinyInteger('category_id')->autoIncrement();
            $table->string('category_title', 64)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('category_text', 255)->charset('utf8')->collation('utf8_unicode_ci');
            $table->mediumInteger('file_id')->nullable()->autoIncrement(false);
            $table->string('file_address',1000)->charset('utf8')->collation('utf8_unicode_ci');
            $table->tinyInteger('category_Privilege')->autoIncrement(false);
            $table->boolean('category_status')->default(1)->autoIncrement(false);
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
        Schema::dropIfExists('category');
    }
}
