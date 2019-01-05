<?php

namespace Tests;

use Namelivia\Wallapophp\RequestBuilder;
use Namelivia\Wallapophp\WallapopClient;
use Mockery;

class WallapopRequestBuilderTest extends TestCase
{
	private $requestBuilder;
	private $wallapopClient;

	public function setUp()
	{
		parent::setUp();
		$this->requestBuilder = Mockery::mock(RequestBuilder::class);
		$this->wallapopClient = new WallapopClient($this->requestBuilder);
	}

	public function testRequestingAUser()
	{
		$userId = 1;
		$this->requestBuilder->shouldReceive('buildRequest')
			->once()
			->with('GET', 'user.json/' . $userId, [])
			->andReturn('result');
		$this->assertEquals(
			'result',
			$this->wallapopClient->user($userId)
		);
	}

	public function testRequestingUserReceivedReviews()
	{
		$userId = 1;
		$this->requestBuilder->shouldReceive('buildRequest')
			->once()
			->with('GET', 'review.json/user/' . $userId . '/received', [])
			->andReturn('result');
		$this->assertEquals(
			'result',
			$this->wallapopClient->userReviewsReceived($userId)
		);
	}

	public function testRequestingUserSentReviews()
	{
		$userId = 1;
		$this->requestBuilder->shouldReceive('buildRequest')
			->once()
			->with('GET', 'review.json/user/' . $userId . '/send', [])
			->andReturn('result');
		$this->assertEquals(
			'result',
			$this->wallapopClient->userReviewsSent($userId)
		);
	}

	public function testRequestingUserItemsPublished()
	{
		$userId = 1;
		$start = 10;
		$end = 50;
		$this->requestBuilder->shouldReceive('buildItemsRequest')
			->once()
			->with('PUBLISHED', $userId, $start, $end)
			->andReturn('result');
		$this->assertEquals(
			'result',
			$this->wallapopClient->userItemsPublished($userId, $start, $end)
		);
	}

	public function testRequestingUserItemsSold()
	{
		$userId = 1;
		$start = 10;
		$end = 50;
		$this->requestBuilder->shouldReceive('buildItemsRequest')
			->once()
			->with('SOLD_OUTSIDE', $userId, $start, $end)
			->andReturn('result');
		$this->assertEquals(
			'result',
			$this->wallapopClient->userItemsSold($userId, $start, $end)
		);
	}

	public function testSearching()
	{
		$latitude = 20.50;
		$longitude = 4.10;
		$query = 'some test';
		$categoryIds = '1,2,3';
		$orderBy = 'price';
		$orderType = 'asc';
		$timeFilter = '24Hours';
		$this->requestBuilder->shouldReceive('buildRequest')
			->once()
			->with('GET', 'item.json/search8', [
				'latitude' => $latitude,
				'longitude' => $longitude,
				'orderBy' => $orderBy,
				'orderType' => $orderType,
				'timeFilter' => $timeFilter,
				'keywords' => $query,
				'categoryIds' => $categoryIds
			])
			->andReturn('result');
		$this->assertEquals(
			'result',
			$this->wallapopClient->search(
				$latitude,
				$longitude,
				$query,
				$categoryIds,
				$orderBy,
				$orderType,
				$timeFilter
			)
		);
	}
}
