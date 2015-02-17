<?php

class Province extends \Eloquent 
{
	protected $fillable = array('id', 'nama', 'nama_lengkap', 'nama_inggris', 'jumlah_kursi', 'jumlah_penduduk', 'pro_id');
	protected $hidden = array('created_at', 'updated_at');
	protected $table = 'provinces';

	public function candidates()
	{
		return $this->hasMany('Candidate', 'provinsi_id', 'id');
	}

	public function allProvinces()
	{
		return DB::table($this->table)
			->select(
				'id',
				'nama',
				'nama_lengkap',
				'nama_inggris',
				'jumlah_kursi',
				'jumlah_penduduk',
				'pro_id'
				)
			->get();
	}

}