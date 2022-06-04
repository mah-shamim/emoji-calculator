<?php


namespace App\Services\EmojiCalculator;


use App\Interfaces\EmojiCalculator\EmojiCalculatorOperation;

class EmojiCalculatorDivision implements EmojiCalculatorOperation
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
        if($this->secondOperand == 0){
            $this->result['operation'] = 'Division';
            $this->result['result'] = "Can't divide by 0";
            $this->result['explanation'] = $this->firstOperand .' ÷ '. $this->secondOperand .' = '. $this->result['result'];
        }else{
            $this->result['operation'] = 'Division';
            $this->result['result'] = $this->firstOperand / $this->secondOperand;
            $this->result['explanation'] = $this->firstOperand .' ÷ '. $this->secondOperand .' = '. $this->result['result'];
        }
        return $this->result;
    }
}
