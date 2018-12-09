<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TotalTransc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totaltransaksis', function (Blueprint $table) {
			$table->increments('id'); 
			$table->integer('id_cus'); 		
			$table->integer('total');                         
            $table->integer('id_transc');                                    
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
