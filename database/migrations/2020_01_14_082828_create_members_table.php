<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('username')->unique()->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('phone')->unique()->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('email')->unique()->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('firstname')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('lastname')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->tinyInteger('roleid')->nullable()->autoIncrement(false);
            $table->bigInteger('city_id')->default(1)->nullable()->autoIncrement(false);
            $table->string('zipcode')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->boolean('gender')->autoIncrement(false); 
            $table->date('birthdate')->nullable(); 
            $table->dateTime('lastlogin'); 
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
        Schema::dropIfExists('members');
    }
}
