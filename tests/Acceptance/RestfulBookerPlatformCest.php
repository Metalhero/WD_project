<?php

declare(strict_types=1);


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Enums\FieldTypes;

final class RestfulBookerPlatformCest
{
    public function _before(AcceptanceTester $I): void
    {
        // Code here will be executed before each test.
    }

    public function tryToTest(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->waitForText('Check Availability & Book Your Stay', 30);
        $I->see('Check Availability & Book Your Stay');
        $I->myClick('Book Now');
        //$I->click("//a[@class='btn btn-primary btn-lg']");
        $I->myClick('Book now', 2);
        //$I->click("(//a[contains(@class, 'btn-primary')])[3]");
        $I->waitForText('Room Description', 3);
        $I->myClick('Reserve Now');
        $I->myFill("Firstname", "SGY", FieldTypes::TEXT);
    }
}
