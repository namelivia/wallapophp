<?php

namespace Namelivia\Wallapophp;

class WallapopClient {

	private $requestBuilder;

	public function __construct(RequestBuilder $requestBuilder)
	{
		$this->requestBuilder = $requestBuilder;
	}

	public function user(string $userId)
	{
		$endpoint = 'user.json/' . $userId;
		return $this->requestBuilder->buildRequest('GET', $endpoint, []);
	}

	public function userReviewsReceived(string $userId)
	{
		$endpoint = 'review.json/user/' . $userId . '/received';
		return $this->requestBuilder->buildRequest('GET', $endpoint, []);
	}

	public function userReviewsSent(string $userId)
	{
		$endpoint = 'review.json/user/' . $userId . '/send';
		return $this->requestBuilder->buildRequest('GET', $endpoint, []);
	}

	public function userItemsPublished(string $userId, int $start = 0, int $end = 250) 
	{
		return $this->requestBuilder->buildItemsRequest('PUBLISHED', $userId, $start, $end);
	}

	public function userItemsSold(string $userId, int $start = 0, int $end = 250) 
	{
		return $this->requestBuilder->buildItemsRequest('SOLD_OUTSIDE', $userId, $start, $end);
	}

	public function search(//TODO: research the type hintings here
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
			'orderBy' => $orderBy,
			'orderType' => $orderType,
			'timeFilter' => $timeFilter
		];
		if (!is_null($query)) {
			$params['keywords'] = $query;
		}
		if (!is_null($categoryIds)) {
			$params['categoryIds'] = $categoryIds;
		}
		return $this->requestBuilder->buildRequest('GET', 'item.json/search8', $params);
	}
}
