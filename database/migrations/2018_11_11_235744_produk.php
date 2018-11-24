<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
			$table->increments('id'); // create column auto increment
			$table->string('nama_prod', 128); // create column nama			
			$table->text('desc_prod'); // create column email                                          
                        $table->integer('harga_prod');
                        $table->text('foto1_prod');
                        $table->text('foto2_prod');
                        $table->integer('id_cus');
                        
			$table->timestamps(); // create column created_at dan updated_at (default laravel)
        });         //
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
