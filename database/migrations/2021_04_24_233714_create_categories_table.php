<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id_category'); // id_category
            $table->integer('id_business')->unsigned();
            $table->string('name_cate',50);
            $table->foreign('id_business')->references('id_business')->on('business');
        });

        /*[**** INSERT TABLE CATEGORIES****]*/
         DB::table('categories')->insert(array('id_category'=>'1','id_business'=>'1','name_cate'=>'Nivel Basico'));
         DB::table('categories')->insert(array('id_category'=>'2','id_business'=>'1','name_cate'=>'Nivel Intermedio'));
         DB::table('categories')->insert(array('id_category'=>'3','id_business'=>'1','name_cate'=>'Nivel Avanzado'));
         DB::table('categories')->insert(array('id_category'=>'4','id_business'=>'1','name_cate'=>'Nivel Experto'));
         DB::table('categories')->insert(array('id_category'=>'5','id_business'=>'2','name_cate'=>'Nivel Basico'));
         DB::table('categories')->insert(array('id_category'=>'6','id_business'=>'2','name_cate'=>'Nivel Intermedio'));
         DB::table('categories')->insert(array('id_category'=>'7','id_business'=>'2','name_cate'=>'Nivel Avanzado'));
         DB::table('categories')->insert(array('id_category'=>'8','id_business'=>'3','name_cate'=>'Nivel Basico'));
         DB::table('categories')->insert(array('id_category'=>'9','id_business'=>'3','name_cate'=>'Nivel Intermedio'));
         DB::table('categories')->insert(array('id_category'=>'10','id_business'=>'4','name_cate'=>'Nivel Experto'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
