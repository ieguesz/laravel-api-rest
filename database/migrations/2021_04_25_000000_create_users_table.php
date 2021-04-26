<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user'); // id_user
            $table->integer('id_business')->unsigned();
            $table->string('name_user',20);
            $table->foreign('id_business')->references('id_business')->on('business');
        });

        /*[**** INSERT TABLE USERS****]*/
        DB::table('users')->insert(array('id_user'=>'1','id_business'=>'1','name_user'=>'IRWIN EGUES'));
        DB::table('users')->insert(array('id_user'=>'2','id_business'=>'2','name_user'=>'SAUL SANTANA'));
        DB::table('users')->insert(array('id_user'=>'3','id_business'=>'3','name_user'=>'ROCO GOMEZ'));
        DB::table('users')->insert(array('id_user'=>'4','id_business'=>'4','name_user'=>'ESTEVAN LOPEZ'));
        DB::table('users')->insert(array('id_user'=>'5','id_business'=>'1','name_user'=>'RODRIGO LOPEZ'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
