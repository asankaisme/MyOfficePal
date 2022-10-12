<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendingRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lending_registers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('requester_name')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('extension')->nullable();
            $table->string('lent_by')->nullable();
            $table->date('date_lent')->nullable();
            $table->string('status', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lending_registers');
    }
}
