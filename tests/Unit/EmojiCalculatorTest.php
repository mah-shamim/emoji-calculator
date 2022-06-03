<?php

use App\Services\EmojiCalculatorService;
use PHPUnit\Framework\TestCase;

class EmojiCalculatorTest extends TestCase
{
    /**
     * Test can create addition class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteAddition()
    {
        $emojiCalculatorResult = new EmojiCalculatorService();

        $sum = $emojiCalculatorResult->calculate('5👽5');

        $this->assertEquals($sum['result'],10);
    }

    /**
     * Test can create subtraction class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteSubtraction()
    {
        $emojiCalculatorResult = new EmojiCalculatorService();

        $sum = $emojiCalculatorResult->calculate('20💀10');

        $this->assertEquals($sum['result'],10);
    }

    /**
     * Test can create multiplication class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteMultiplication()
    {
        $emojiCalculatorResult = new EmojiCalculatorService();

        $sum = $emojiCalculatorResult->calculate('20👻10');

        $this->assertEquals($sum['result'],200);
    }

    /**
     * Test can create division class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteDivision()
    {
        $emojiCalculatorResult = new EmojiCalculatorService();

        $sum = $emojiCalculatorResult->calculate('20😱10');

        $this->assertEquals($sum['result'],2);
    }

    /**
     * Test can create subtraction class and returns correct value
     *
     * @return void
     */
    public function testCalculateExecuteDivisionByZero()
    {
        $emojiCalculatorResult = new EmojiCalculatorService();

        $sum = $emojiCalculatorResult->calculate('20😱0');

        $this->assertEquals($sum['result'],"Can't divide by 0");
    }
}
