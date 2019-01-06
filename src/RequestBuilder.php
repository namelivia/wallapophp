<?php

namespace Namelivia\Wallapophp;

use GuzzleHttp\Client;

class RequestBuilder
{
    const BASE_URL = 'http://pro2.wallapop.com/shnm-portlet/api/v1/';

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function buildItemsRequest($itemsState, $userId, $start, $end)
    {
        $endpoint = 'item.json/user2/'.$userId;
        $params = [
        'init' => $start,
        'end' => $end,
        'statuses' => $itemsState,
        ];

        return $this->buildRequest('GET', $endpoint, $params);
    }

    public function buildRequest($method, $endpoint, $params)
    {
        $url = self::BASE_URL.$endpoint.'?'.http_build_query($params);

        return $this->client->request($method, $url)->getBody();
    }
}
