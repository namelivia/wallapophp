<?php

namespace Namelivia\Wallapophp;

class WallapopRequestBuilder {

	const BASE_URL = 'http://pro2.wallapop.com/shnm-portlet/api/v1';

	function user($userId)
	{
		$endpoint = 'user.json/' . $userId;
		return $this->buildRequest('GET', $endpoint, []);
	}

	function userReviewsReceived($userId)
	{
		$endpoint = 'review.json/user/' . $userId . '/received';
		return $this->buildRequest('GET', $endpoint, []);
	}

	function userReviewsSent($userId)
	{
		$endpoint = 'review.json/user/' . $userId . '/send';
		return $this->buildRequest('GET', $endpoint, []);
	}

	function userItemsPublished($userId, $start = 0, $end = 250) 
	{
		return $this->buildItemsRequest('PUBLISHED', $userId, $start, $end);
	}

	function userItemsSold($userId, $start = 0, $end = 250) 
	{
		return $this->buildItemsRequest('SOLD_OUTSIDE', $userId, $start, $end);
	}

	function search(
		$latitude,
		$longitude,
		$query = null,
		$categoryIds = null,
		$orderBy = 'creationDate',
		$orderType = 'des',
		$timeFilter = 'noLimit'
	) {
		$params = [
			'latitude' => $latitude,
			'longitude' => $longitude,
			'orderBy' => $ordeBy,
			'orderType' => $orderType,
			'timeFilter' => $timeFilter
				];
				if (!is_null($query)) {
					$params['keywords'] = $query;
				}
				if (!is_null($categoryIds)) {
					$params['categoryIds'] = $categoryIds;
				}
		return $this->buildRequest('GET', 'item.json/search8', $params);
	}

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

	private function buildRequest($method, $endpoint, $params)
	{
			$url = BASE_URL . $endpoint . urlencode($params);
				return [
					'method' => $method,
					'url' => $url
				];
	}
}
