<?php

use App\Services\EmojiCalculatorService;
use PHPUnit\Framework\TestCase;

class EmojiCalculatorTest extends TestCase
{

    /**
     * @var EmojiCalculatorService
     */
    protected EmojiCalculatorService $emojiCalculator;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->emojiCalculator = new EmojiCalculatorService();
    }

    /**
     * Test can create addition class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteAddition(): void
    {
        $sum = $this->emojiCalculator->calculate('5👽5');

        $this->assertEquals($sum['result'],10);
    }

    /**
     * Test can create subtraction class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteSubtraction(): void
    {
        $subtraction = $this->emojiCalculator->calculate('20💀10');

        $this->assertEquals($subtraction['result'],10);
    }

    /**
     * Test can create multiplication class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteMultiplication(): void
    {
        $multiplication = $this->emojiCalculator->calculate('20👻10');

        $this->assertEquals($multiplication['result'],200);
    }

    /**
     * Test can create division class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteDivision(): void
    {
        $division = $this->emojiCalculator->calculate('20😱10');

        $this->assertEquals($division['result'],2);
    }

    /**
     * Test can create subtraction class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteDivisionByZero(): void
    {
        $divisionByZero = $this->emojiCalculator->calculate('20😱0');

        $this->assertEquals($divisionByZero['result'],"Can't divide by 0");
    }
}
