<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerdinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdins', function (Blueprint $table) {
            $table->id();
            $table->string('project_no',100)->unique();
            $table->string('official_travel_site',100);
            $table->integer('long_tour_of_duty');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('purpose_bussiness_trip',200);
            $table->bigInteger('hotel')->nullable();
            $table->bigInteger('rented_house')->nullable();
            $table->bigInteger('meals_allowance')->nullable();
            $table->bigInteger('hardship_allowance')->nullable();
            $table->bigInteger('pulsa_allowance')->nullable();
            $table->bigInteger('local_transport_pp')->nullable();
            $table->bigInteger('local_transport_area')->nullable();
            $table->bigInteger('transportation')->nullable();
            $table->bigInteger('rental_vehicle')->nullable();
            $table->bigInteger('airport_tax')->nullable();
            $table->bigInteger('entertainment')->nullable();
            $table->bigInteger('fee_support_worker')->nullable();
            $table->bigInteger('atk_work')->nullable();
            $table->bigInteger('others')->nullable();
            $table->bigInteger('total_cash_received')->nullable();
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
        Schema::dropIfExists('perdins');
    }
}