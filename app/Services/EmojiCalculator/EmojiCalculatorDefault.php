<?php


namespace App\Services\EmojiCalculator;


use App\Interfaces\EmojiCalculator\EmojiCalculatorOperation;

class EmojiCalculatorDefault implements EmojiCalculatorOperation
{

    /**
     * @var mixed $firstOperand
     */
    private mixed $firstOperand;
    /**
     * @var mixed $secondOperand
     */
    private mixed $secondOperand;
    /**
     * @var array $result
     */
    private array $result = array();

    /**
     * EmojiCalculatorAddition constructor.
     * @param $firstOperand
     * @param $secondOperand
     */
    public function __construct($firstOperand, $secondOperand)
    {
        $this->firstOperand = $firstOperand;
        $this->secondOperand = $secondOperand;
    }

    /**
     * @return array
     */
    public function perform(): array
    {
        $this->result['operation'] = 'INVALID';
        $this->result['result'] = 'N/A';
        $this->result['explanation'] = $this->firstOperand .' + '. $this->secondOperand .' = '. 'Invalid Expression';
        return $this->result;
    }
}
