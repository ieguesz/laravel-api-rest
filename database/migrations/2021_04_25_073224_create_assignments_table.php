<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id_assignment'); // id_assignment
            $table->integer('id_user')->unsigned();
            $table->integer('id_category')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_category')->references('id_category')->on('categories');
            // $table->timestamps();
        });

        /*[**** INSERT TABLE ASIGNNMETS****]*/
        DB::table('assignments')->insert(array('id_user'=>'1','id_category'=>'1'));
        DB::table('assignments')->insert(array('id_user'=>'1','id_category'=>'2'));
        DB::table('assignments')->insert(array('id_user'=>'1','id_category'=>'3'));
        DB::table('assignments')->insert(array('id_user'=>'2','id_category'=>'5'));
        DB::table('assignments')->insert(array('id_user'=>'2','id_category'=>'6'));
        DB::table('assignments')->insert(array('id_user'=>'2','id_category'=>'7'));
        DB::table('assignments')->insert(array('id_user'=>'3','id_category'=>'8'));
        DB::table('assignments')->insert(array('id_user'=>'3','id_category'=>'9'));
        DB::table('assignments')->insert(array('id_user'=>'4','id_category'=>'10'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
