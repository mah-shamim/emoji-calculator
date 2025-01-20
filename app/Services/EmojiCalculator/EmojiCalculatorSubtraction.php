<?php

namespace App\Services\EmojiCalculator;

use App\Interfaces\EmojiCalculator\EmojiCalculatorOperation;

class EmojiCalculatorSubtraction implements EmojiCalculatorOperation
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
        $this->result['operation'] = 'Subtraction';
        $this->result['result'] = $this->firstOperand - $this->secondOperand;
        $this->result['explanation'] = $this->firstOperand.' − '.$this->secondOperand.' = '.$this->result['result'];

        return $this->result;
    }
}
