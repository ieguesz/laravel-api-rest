<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id_business'); // id_business
            $table->string('name_busi',100);
        });

        /*[**** INSERT TABLE BUSINESS****]*/
        DB::table('business')->insert(array('id_business'=>'1','name_busi'=>'PROMART TR'));
        DB::table('business')->insert(array('id_business'=>'2','name_busi'=>'SAGA FALABELLA TD'));
        DB::table('business')->insert(array('id_business'=>'3','name_busi'=>'TOTTUS TA'));
        DB::table('business')->insert(array('id_business'=>'4','name_busi'=>'RIPLEY TC'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business');
    }
}
