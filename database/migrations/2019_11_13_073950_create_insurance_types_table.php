<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('insurance_type_name');
            $table->boolean('status')->default(1);
            $table->string('icon')->nullable();
            $table->string('insurance_type_image')->nullable();
            $table->string('insurance_description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
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
        Schema::dropIfExists('insurance_types');
    }
}
