<?php

class Candidate extends \Eloquent 
{
	protected $fillable = array('id', 'provinsi_id', 'daerah_pemilihan_id', 'calon_terpilih', 'suara', 'peringkat');
	protected $hidden = array('created_at', 'updated_at');
	protected $table = 'candidates';

	public function candidateProvince()
	{
		return $this->hasOne('Province', 'id', 'provinsi_id');
	}

	public function getIdAttribute($value)
	{
		return intval($value);
	}

	public function getSuaraAttribute($value)
	{
		return intval($value);
	}

	public function getPeringkatAttribute($value)
	{
		return intval($value);
	}

	public function allCandidates()
	{
		return DB::table($this->table)
			->join('provinces', 'candidates.provinsi_id', '=', 'provinces.id')
			->join('provinces as provinces_pemilihan', 'candidates.daerah_pemilihan_id', '=', 'provinces_pemilihan.id')
			->select(
				'candidates.id',
				'provinces.nama_lengkap as provinsi',
				'provinces_pemilihan.nama_lengkap as daerah_pemilihan',
				'candidates.calon_terpilih',
				'candidates.suara',
				'candidates.peringkat'
				)
			->get();
	}

	public function allCandidatesPaged($limit=100, $offset=0, $params=array('province'=>null))
	{
		$query = DB::table($this->table);

		if (!empty($params['province']))
		{
			$query = $query->where('provinces.id', '=', $params['province']);
		}

		$query = $query
			->join('provinces', 'candidates.provinsi_id', '=', 'provinces.id')
			->join('provinces as provinces_pemilihan', 'candidates.daerah_pemilihan_id', '=', 'provinces_pemilihan.id')
			->select(
				'candidates.id',
				'provinces.nama_lengkap as provinsi',
				'provinces_pemilihan.nama_lengkap as daerah_pemilihan',
				'candidates.calon_terpilih',
				'candidates.suara',
				'candidates.peringkat'
				)
			->skip($offset)->take($limit)
			->get();

		return $query;
	}

}