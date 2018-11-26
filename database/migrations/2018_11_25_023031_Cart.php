<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
			$table->increments('id'); 
			$table->integer('idprod'); 		
			$table->integer('idcus');                         
                        $table->integer('qtt');                        
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
        Schema::drop('carts');
    }
}
