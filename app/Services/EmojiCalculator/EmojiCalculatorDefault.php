<?php

namespace App\Services\EmojiCalculator;

use App\Interfaces\EmojiCalculator\EmojiCalculatorOperation;

class EmojiCalculatorDefault implements EmojiCalculatorOperation
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
        $this->result['operation'] = 'INVALID';
        $this->result['result'] = 'N/A';
        $this->result['explanation'] = $this->firstOperand.' + '.$this->secondOperand.' = '.'Invalid Expression';

        return $this->result;
    }
}
