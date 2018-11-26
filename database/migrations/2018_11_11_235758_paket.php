<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id', function (Blueprint $table) {
			$table->increments('id'); // create column auto increment
			$table->string('nama_paket', 128); // create column nama			
			$table->text('desc'); // create column email                                          
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
