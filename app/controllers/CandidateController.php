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

		return XApi::parser( $this->candidate->allPostsPaged($limit, $offset) );
	}

}
