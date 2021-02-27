<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) { 
            $table->id();
            $table->string('emoplyee_no');
            $table->string('name');
            $table->foreignId('designation_id')->constrained()->onDelete('cascade'); // foreignkey for designation table
            $table->string('department');
            $table->string('company');
            $table->double('salary', 8, 2)->nullable();
            $table->date('joining_date')->nullable();
            $table->date('termination_date')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
