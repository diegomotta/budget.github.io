<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value')->nullable();
            $table->unsignedInteger('type_amount_id')->nullable();
            $table->foreign('type_amount_id')->references('id')->on('type_amounts');
            $table->unsignedInteger('type_expense_id')->nullable();
            $table->foreign('type_expense_id')->references('id')->on('type_expenses');

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
        Schema::dropIfExists('expenses');
    }
}
