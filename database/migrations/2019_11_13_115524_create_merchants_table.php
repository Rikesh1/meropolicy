<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('company_slug')->unique();
            $table->string('company_phone')->nullable();
            $table->string('company_logo')->nullable();
            $table->enum('commission_type', ['fixed', 'percentage'])->nullable();
            $table->float('commission_rate', 10, 2)->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('avatar')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('ip_address')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
