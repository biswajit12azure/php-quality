<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Calculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd(): void
    {
        $result = $this->calculator->add(10, 20);

        $this->assertSame(30, $result);
    }

    public function testSubtract(): void
    {
        $result = $this->calculator->subtract(20, 10);

        $this->assertSame(10, $result);
    }

    public function testMultiply(): void
    {
        $result = $this->calculator->multiply(5, 4);

        $this->assertSame(20, $result);
    }

    public function testDivide(): void
    {
        $result = $this->calculator->divide(20, 4);

        $this->assertSame(5.0, $result);
    }

    public function testDivideByZeroThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->calculator->divide(10, 0);
    }
}