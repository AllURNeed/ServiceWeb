<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default("CompanyName");
            $table->string('Email')->default("Email@gmail.com");
            $table->BigInteger('Mobile')->default("0123456789");
            $table->BigInteger('Whatapp')->default("0123456789");
            $table->string('Facebook')->nullable()->default("#");
            $table->string('Twitter')->nullable()->default("#");
            $table->string('linkedin')->nullable()->default("#");
            $table->text('Address')->default("Address");
            $table->text('Description')->default("Description");
            $table->string('logo')->default("Logo");
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
        Schema::dropIfExists('company_details');
    }
};
