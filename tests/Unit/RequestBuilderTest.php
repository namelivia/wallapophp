<?php

namespace Tests;

use Namelivia\Wallapophp\RequestBuilder;

class RequestBuilderTest extends TestCase
{
	private $requestBuilder;

	public function setUp()
	{
		parent::setUp();
		$this->requestBuilder = new RequestBuilder();
	}

	public function testBuildingARequest()
	{
		$method = 'GET';
	  $endpoint = 'example';
		$params = [
			'param1' => 'value1',
			'param2' => 'value2',
		];
		$this->assertEquals(
			[
				'method' => 'GET',
				'url' => 'http://pro2.wallapop.com/shnm-portlet/api/v1/example?param1=value1&param2=value2'
			],
			$this->requestBuilder->buildRequest($method, $endpoint, $params)
		);
	}

	public function testBuildingAnItemRequest()
	{
	  $itemsState = 'SOLD';
	  $userId = '3';
		$start = 10;
		$end = 50;
		$this->assertEquals(
			[
				'method' => 'GET',
				'url' => 'http://pro2.wallapop.com/shnm-portlet/api/v1/item.json/user2/3?init=10&end=50&statuses=SOLD'
			],
			$this->requestBuilder->buildItemsRequest($itemsState, $userId, $start, $end)
		);
	}
}
