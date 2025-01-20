<?php

namespace App\Services;

use App\Services\EmojiCalculator\EmojiCalculatorAddition;
use App\Services\EmojiCalculator\EmojiCalculatorDefault;
use App\Services\EmojiCalculator\EmojiCalculatorDivision;
use App\Services\EmojiCalculator\EmojiCalculatorMultiplication;
use App\Services\EmojiCalculator\EmojiCalculatorSubtraction;

class EmojiCalculatorService
{
    private string $expression;

    private mixed $firstOperand;

    private mixed $secondOperand;

    private string $operator;

    /**
     * EmojiCalculatorService constructor.
     */
    public function __construct()
    {
        $this->expression = '';
    }

    public function calculate(string $text): array
    {
        $this->expression = (strtolower($text));

        return $this->emojiExpression();
    }

    private function emojiExpression(): array
    {
        $output_array = [];
        if (
            preg_match(
                '/(-?[0-9]+)(u\+[0-9a-fA-F]{5}|👽|💀|👻|😱|alien|skull|ghost|scream)(-?[0-9]+)/i',
                $this->expression,
                $output_array
            ) > 0
        ) {
            $this->firstOperand = $output_array[1] ?? '';
            $this->secondOperand = $output_array[3] ?? '';
            $this->operator = $output_array[2] ?? '';
        } else {
            $this->firstOperand = $output_array[1] ?? '';
            $this->secondOperand = $output_array[3] ?? '';
            $this->operator = $output_array[2] ?? '';
        }

        return $this->calculator();
    }

    private function calculator(): array
    {
        $result = [];
        $result['operation'] = '';
        $result['explanation'] = '';
        $result['result'] = '';

        switch ($this->operator) {
            case '\\ud83d\\udc7d':
            case '👽':
            case 'alien':
            case 'u+1f47d':
                $result = new EmojiCalculatorAddition($this->firstOperand, $this->secondOperand);
                break;

            case '\\ud83d\\udc80':
            case '💀':
            case 'skull':
            case 'u+1f480':
                $result = new EmojiCalculatorSubtraction($this->firstOperand, $this->secondOperand);
                break;
            case '\\ud83d\\udc7b':
            case '👻':
            case 'ghost':
            case 'u+1f47b':
                $result = new EmojiCalculatorMultiplication($this->firstOperand, $this->secondOperand);
                break;
            case '\\ud83d\\ude31':
            case '😱':
            case 'scream':
            case 'u+1f631':
                $result = new EmojiCalculatorDivision($this->firstOperand, $this->secondOperand);
                break;
            default:
                $result = new EmojiCalculatorDefault($this->firstOperand, $this->secondOperand);
                break;
        }

        return $result->perform();
    }
}
