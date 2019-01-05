<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use DI\Container;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    protected $app;

    public function setUp()
    {
        parent::setUp();
        $this->app = new Container();
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
