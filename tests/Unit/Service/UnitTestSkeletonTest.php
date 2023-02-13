<?php

namespace App\Tests\Unit\Service;

use App\Service\UnitTestSkeleton;
use App\TestProject\Service\ChangeCollectionStatusService;
use PHPUnit\Framework\TestCase;

class UnitTestSkeletonTest extends TestCase
{

    public function testInitialize(): void
    {
        $skeleton = new UnitTestSkeleton(ChangeCollectionStatusService::class);
        $skeleton->initialize();
        $setUpMethodData = $skeleton->generateSetUpMethod();
        self::assertEquals(
            'protected function setUp(): void
    {
        parent::setUp();
    }',
            trim($setUpMethodData)
        );
    }


}
