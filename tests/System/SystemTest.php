<?php

namespace Tests;

use Namelivia\Wallapophp\ServiceProvider;

class SystemTest extends TestCase
{
	public function testRetrievingUserInfo()
	{
		$client = ServiceProvider::build();
		$client->user('realcash-46901051');
	}
}
