<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function(Blueprint $table) {
        
            $table->increments('id');
            $table->integer('provinsi_id')->unsigned();
            $table->integer('daerah_pemilihan_id')->unsigned();
            $table->text('calon_terpilih');
            $table->integer('suara')->unsigned();
            $table->integer('peringkat')->unsigned();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('candidates');
    }
}
