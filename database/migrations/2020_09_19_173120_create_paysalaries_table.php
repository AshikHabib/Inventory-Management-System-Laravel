<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paysalaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('salary_month');
            $table->string('paid_amount');
            // $table->string('status')->default('0');
            // $table->string('advanced_salary')->nullable();
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
        Schema::dropIfExists('paysalaries');
    }
}
