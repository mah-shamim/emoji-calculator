<?php


namespace App\Services\EmojiCalculator;


use App\Interfaces\EmojiCalculator\EmojiCalculatorOperation;

class EmojiCalculatorDefault implements EmojiCalculatorOperation
{

    /**
     * @var mixed $firstOperand
     */
    private $firstOperand;
    /**
     * @var mixed $secondOperand
     */
    private $secondOperand;
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
     * @return mixed|void
     */
    public function perform():mixed
    {
        $this->result['operation'] = 'INVALID';
        $this->result['result'] = 'N/A';
        $this->result['explanation'] = 'Invalid Expression';
        return $this->result;
    }
}
