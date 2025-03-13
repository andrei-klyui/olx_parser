<?php

namespace Tests\Unit;

use App\Mail\PriceChangeMail;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Mail;
use Tests\UnitTestCase;

/**
 * Class NotificationServiceTest.
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 * @covers \App\Services\NotificationService
 */
class NotificationServiceTest extends UnitTestCase
{
    /**
     * test email
     */
    const TEST_EMAIL = 'test@example.com';

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        Mail::fake();
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
    public function testSendPriceChange()
    {
        $newPrice = 1000;
        NotificationService::sendPriceChange(self::TEST_EMAIL, $newPrice);

        // Assert
        Mail::assertSent(PriceChangeMail::class, function ($mail) use ($newPrice) {
            return $mail->hasTo(self::TEST_EMAIL) && $mail->newPrice === $newPrice;
        });
    }

    /**
     * @return void
     */
    public function testFalseSendPriceChange()
    {
        NotificationService::sendPriceChange(self::TEST_EMAIL, null);

        // Assert
        Mail::assertNotSent(PriceChangeMail::class);
    }
}
