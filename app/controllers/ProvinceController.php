<?php

class ProvinceController extends BaseController {

	protected $province;

	public function __construct(Province $province)
	{
		$this->province = $province;
	}

	public function getAll()
	{
		return XApi::parser( $this->province->allProvinces() );
	}

}
