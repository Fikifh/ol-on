<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id'); // create column auto increment
            $table->string('nama', 128); // create column nama			
            $table->string('email', 50); // create column email
            $table->string('password', 128);//create password
            $table->string('noHp', 128);
            $table->text('foto');                        
            $table->timestamps(); // create column created_at dan updated_at (default laravel)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
