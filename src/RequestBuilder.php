<?php

namespace Namelivia\Wallapophp;

class RequestBuilder {

	const BASE_URL = 'http://pro2.wallapop.com/shnm-portlet/api/v1';

	public function buildItemsRequest($itemsState, $userId, $start, $end) 
	{
		$endpoint = 'item.json/user2/' . $userId;
		$params = [
			'init' => $start,
			'end' => $end,
			'statuses' => $itemsState
					];
		return $this->buildRequest('GET', $endpoint, $params);
	}

	public function buildRequest($method, $endpoint, $params)
	{
			$url = BASE_URL . $endpoint . urlencode($params);
				return [
					'method' => $method,
					'url' => $url
				];
	}
}
