<?php

declare(strict_types=1);

namespace App\Tests;

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use DMS\PHPUnitExtensions\ArraySubset\Assert;
use PHPUnit\Framework\TestCase;


class Testes extends TestCase
{


    public function testWithTrait(): void
    {
        $expectedSubset = ['bar' => 0];
        $content = ['bar' => 0];

        //self::assertArraySubset($expectedSubset, $content, true);
    }

    public function testWithDirectCall(): void
    {
        $expectedSubset = ['bar' => 0];
        $content = ['bar' => 0];

        //Assert::assertArraySubset($expectedSubset, $content, true);
    }
}