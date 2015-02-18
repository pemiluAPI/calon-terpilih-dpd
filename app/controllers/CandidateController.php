<?php

class CandidateController extends BaseController {

	protected $candidate;

	public function __construct(Candidate $candidate)
	{
		$this->candidate = $candidate;
	}

	public function getAll()
	{
		$limit = Input::get('limit', 100);
		$offset = Input::get('offset', 0);
		$params = array();
		$params['province'] = Input::get('province', 0);
		// return $params;
		// die();

		return XApi::parser( $this->candidate->allCandidatesPaged($limit, $offset, $params) );
	}

}
