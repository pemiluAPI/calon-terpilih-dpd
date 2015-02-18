<?php

class XApi
{
	public static function response($data = array('error' => 0, 'results' => null, 'message' => null), $http_code = 200)
	{
		return Response::json(
			array(
				'error' =>   $data['error'],
				'message' => empty($data['message']) ? NULL : $data['message'],
				'results' => empty($data['results']) ? NULL : $data['results']
			),
			$http_code);
	}

	public static function parser($datas, $error = 0)
	{
		// Result Template
		$results = array();
		$results['count'] = count($datas);
		$results['data'] = json_decode(json_encode($datas, JSON_NUMERIC_CHECK));

		return XApi::response(array(
				'results' => $results,
				'error' => $error
			));
	}
}