<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->nullable();
            $table->string('province_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('sub_district_id')->nullable();
            $table->string('loc_addr_detail')->nullable();
            $table->string('type_id')->nullable();
            $table->integer('land_area')->nullable();
            $table->integer('year')->nullable();
            $table->string('funding_id')->nullable();
            $table->string('condition')->nullable();
            $table->string('owner')->nullable();
            $table->string('ownership')->nullable();
            $table->string('status')->nullable();
            $table->string('note')->nullable();
            $table->string('report_url')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('verified_by')->nullable();
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
        Schema::dropIfExists('equipment');
    }
}
