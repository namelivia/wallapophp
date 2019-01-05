<?php

namespace Tests;

use Namelivia\Wallapophp\WallapopRequestBuilder;
use Mockery;

class WallapopRequestBuilderTest extends TestCase
{
	private $wallapopRequestBuilder;

	public function setUp()
	{
		parent::setUp();
		$this->wallapopRquestBuilder = new WallapopRequestBuilder();
	}

	public function testTrueIsTrue()
	{
		$this->assertTrue(true);
	}
}
