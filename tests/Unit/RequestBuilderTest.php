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

	public function testTrueIsTrue()
	{
		$this->assertTrue(true);
	}
}
