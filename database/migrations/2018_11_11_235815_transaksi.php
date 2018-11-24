<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
			$table->increments('id'); 
			$table->string('tanggal_transc', 128); 		
			$table->string('id_cus', 50); 
                        $table->string('id_prod', 128);
                        $table->integer('total_transc');
                        $table->integer('id_paket');                        
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
