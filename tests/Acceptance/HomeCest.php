<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Tests\AcceptanceTester;

final class HomeCest
{
    public function applicationIsRunning(AcceptanceTester $I): void
    {
        $I->amOnPage('/');

        $I->seeResponseCodeIs(200);

        $I->see('PHP Quality Training API is running');
    }

    public function healthEndpointWorks(AcceptanceTester $I): void
    {
        $I->amOnPage('/health');

        $I->seeResponseCodeIs(200);

        $I->see('"status":"UP"');
    }

    public function additionEndpointWorks(AcceptanceTester $I): void
    {
        $I->amOnPage('/add?a=10&b=20');

        $I->seeResponseCodeIs(200);

        $I->see('"result":30');
    }

    public function unknownRouteReturns404(AcceptanceTester $I): void
    {
        $I->amOnPage('/unknown');

        $I->seeResponseCodeIs(404);

        $I->see('Route not found');
    }
}
