<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    public function testAdd(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(5.0, $calculator->add(2.0, 3.0));
    }

    public function testSub(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(1.0, $calculator->sub(3.0, 2.0));
    }

    public function testMul(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(6.0, $calculator->mul(2.0, 3.0));
    }

    public function testDiv(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(2.0, $calculator->div(6.0, 3.0));
    }

    public function testPow(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(8.0, $calculator->pow(2.0, 3.0));
    }

    public function testSqrt(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(3.0, $calculator->sqrt(9.0));
    }

    public function testSplitFloat(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(['left' => 123, 'right' => 45], $calculator->splitFloat(123.45));
    }

    public function testGenerateRandomCalculatorName(): void
    {
        $calculator = new Calculator();
        $name = $calculator->generateRandomCalculatorName();
        $this->assertStringStartsWith('Calculator-', $name);
    }
}
