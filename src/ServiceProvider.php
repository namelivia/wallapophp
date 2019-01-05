<?php

namespace Namelivia\Wallapophp;

use GuzzleHttp\Client;

class ServiceProvider
{
    public function build()
    {
        return new WallapopClient(
            new RequestBuilder(
                new Client()
            )
        );
    }
}
