<?php

use App\Services\EmojiCalculatorService;
use PHPUnit\Framework\TestCase;

class EmojiCalculatorTest extends TestCase
{
    protected EmojiCalculatorService $emojiCalculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->emojiCalculator = new EmojiCalculatorService;
    }

    /**
     * Test can create addition class and returns correct value
     */
    public function test_calculate_execute_addition(): void
    {
        $sum = $this->emojiCalculator->calculate('5👽5');

        $this->assertEquals($sum['result'], 10);
    }

    /**
     * Test can create subtraction class and returns correct value
     */
    public function test_calculate_execute_subtraction(): void
    {
        $subtraction = $this->emojiCalculator->calculate('20💀10');

        $this->assertEquals($subtraction['result'], 10);
    }

    /**
     * Test can create multiplication class and returns correct value
     */
    public function test_calculate_execute_multiplication(): void
    {
        $multiplication = $this->emojiCalculator->calculate('20👻10');

        $this->assertEquals($multiplication['result'], 200);
    }

    /**
     * Test can create division class and returns correct value
     */
    public function test_calculate_execute_division(): void
    {
        $division = $this->emojiCalculator->calculate('20😱10');

        $this->assertEquals($division['result'], 2);
    }

    /**
     * Test can create subtraction class and returns correct value
     */
    public function test_calculate_execute_division_by_zero(): void
    {
        $divisionByZero = $this->emojiCalculator->calculate('20😱0');

        $this->assertEquals($divisionByZero['result'], "Can't divide by 0");
    }
}
