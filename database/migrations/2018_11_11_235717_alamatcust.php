<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alamatcust extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('alamatcusts', function (Blueprint $table) {
			$table->increments('id'); // create column auto increment
			$table->integer('id_cus'); // create column nama			
			$table->string('desa', 128); // create column email                                          
                        $table->string('kec', 128);
                        $table->string('kab', 128);
                        $table->string('prov', 128);
                        $table->string('zip', 128);
                        
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
