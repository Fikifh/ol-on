<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
			$table->increments('id'); 
			$table->string('namalengkap',225); 		
			$table->string('jk',20);                         
                        $table->text('alamat');                        
                        $table->string('gambar',225);
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
