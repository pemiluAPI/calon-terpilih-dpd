<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provinces', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('nama');
			$table->text('nama_lengkap');
			$table->text('nama_inggris');
			$table->integer('jumlah_kursi')->unsigned();
			$table->integer('jumlah_penduduk')->unsigned();
			$table->integer('pro_id')->unsigned();
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
		Schema::drop('provinces');
	}

}
