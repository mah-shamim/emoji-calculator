<?php

namespace App\Services\EmojiCalculator;

use App\Interfaces\EmojiCalculator\EmojiCalculatorOperation;

class EmojiCalculatorDivision implements EmojiCalculatorOperation
{
    private mixed $firstOperand;

    private mixed $secondOperand;

    private array $result = [];

    /**
     * EmojiCalculatorAddition constructor.
     */
    public function __construct($firstOperand, $secondOperand)
    {
        $this->firstOperand = $firstOperand;
        $this->secondOperand = $secondOperand;
    }

    public function perform(): array
    {
        if ($this->secondOperand != 0) {
            $this->result['operation'] = 'Division';
            $this->result['result'] = $this->firstOperand / $this->secondOperand;
            $this->result['explanation'] = $this->firstOperand.' ÷ '.$this->secondOperand.' = '.$this->result['result'];
        } else {
            $this->result['operation'] = 'Division';
            $this->result['result'] = "Can't divide by 0";
            $this->result['explanation'] = $this->firstOperand.' ÷ '.$this->secondOperand.'  = '.$this->result['result'];
        }

        return $this->result;
    }
}
