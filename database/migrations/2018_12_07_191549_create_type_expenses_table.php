<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->unsignedInteger('type_amount_id')->nullable();
            $table->foreign('type_amount_id')->references('id')->on('type_amounts');
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
        Schema::dropIfExists('type_expenses');
    }
}
