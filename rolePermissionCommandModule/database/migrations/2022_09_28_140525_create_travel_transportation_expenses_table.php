<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTransportationExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_transportation_expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->longText('description')->nullable();
            $table->double('meal_expense')->nullable();
            $table->double('accommodation_expense')->nullable();
            $table->double('fare_amount')->nullable();
            $table->double('other_expenses')->nullable();
            $table->double('exchange_rate')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('total_amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('km_travelled')->nullable();
            $table->string('travel_mode')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('travel_transportation_expenses');
    }
}
