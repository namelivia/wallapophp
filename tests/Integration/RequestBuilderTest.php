<?php

namespace Tests;

use Namelivia\Wallapophp\RequestBuilder;
use GuzzleHttp\Client;
use Mockery;

class RequestBuilderTest extends TestCase
{
    private $requestBuilder;
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = Mockery::mock(Client::class);
        $this->requestBuilder = new RequestBuilder($this->client);
    }

    public function testBuildingARequest()
    {
        $method = 'GET';
        $endpoint = 'example';
        $params = [
        'param1' => 'value1',
        'param2' => 'value2',
        ];
        $this->client->shouldReceive('request')
            ->once()
            ->with('GET', 'http://pro2.wallapop.com/shnm-portlet/api/v1/example?param1=value1&param2=value2')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody')
            ->once()
            ->with()
            ->andReturn('response');
        $this->assertEquals(
            'response',
            $this->requestBuilder->buildRequest($method, $endpoint, $params)
        );
    }

    public function testBuildingAnItemRequest()
    {
        $itemsState = 'SOLD';
        $userId = '3';
        $start = 10;
        $end = 50;
        $this->client->shouldReceive('request')
            ->once()
            ->with('GET', 'http://pro2.wallapop.com/shnm-portlet/api/v1/item.json/user2/3?init=10&end=50&statuses=SOLD')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody')
            ->once()
            ->with()
            ->andReturn('response');
        $this->assertEquals(
            'response',
            $this->requestBuilder->buildItemsRequest($itemsState, $userId, $start, $end)
        );
    }
}
