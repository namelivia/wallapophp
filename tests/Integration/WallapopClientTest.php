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

	public function testTrueIsTrue()
	{
		$this->assertTrue(true);
	}
}
