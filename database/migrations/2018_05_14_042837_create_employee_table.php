<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name',100);
            $table->string('email')->unique();
            $table->integer('country')->unsigned()->index();
            $table->text('address')->nullable();
            $table->date('bdate')->nullable();
            $table->enum('gender',['male','female'])->default('male');            
            $table->text('hobbies')->nullable();            
            $table->string('photo')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('employee');
    }
}
