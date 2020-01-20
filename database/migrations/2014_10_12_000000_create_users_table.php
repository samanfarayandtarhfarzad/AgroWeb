<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('username')->unique()->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('email')->unique()->charset('utf8')->collation('utf8_unicode_ci');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('firstname')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('lastname')->charset('utf8')->collation('utf8_unicode_ci');
            $table->tinyInteger('roleid')->nullable();
            $table->boolean('status')->default(1)->autoIncrement(false); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
