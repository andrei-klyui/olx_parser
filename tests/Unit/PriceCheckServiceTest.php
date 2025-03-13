<?php

namespace Tests\Unit;

use App\Services\PriceCheckService;
use Illuminate\Support\Facades\Http;
use Tests\UnitTestCase;

/**
 * Class PriceCheckServiceTest.
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 * @covers \App\Services\PriceCheckService
 */
final class PriceCheckServiceTest extends UnitTestCase
{
    /**
     * Base URL for OLX
     */
    private const BASE_URL = 'https://www.olx.ua/';

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @return void
     */
    public function testGetPrice()
    {
        Http::fake([
            self::BASE_URL . '*' => Http::response('{"price": 1000}', 200)
        ]);

        $url = self::BASE_URL . 'd/obyavlenie/iphone-12-IDX1234.html';
        $price = PriceCheckService::getPrice($url);

        // Assert
        $this->assertEquals(1000, $price);
    }

    /**
     * @return void
     */
    public function testGetPriceAndNotFound()
    {
        Http::fake([
            self::BASE_URL . '*' => Http::response('{"name": "iphone"}', 200)
        ]);

        $url = self::BASE_URL . 'd/obyavlenie/iphone-12-IDX1234.html';
        $price = PriceCheckService::getPrice($url);

        // Assert
        $this->assertNull($price);
    }
}
