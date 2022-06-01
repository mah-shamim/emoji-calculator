<?php


namespace App\Services;


class EmojiCalculatorService
{
    /**
     * @var string $expression
     */
    private $expression;
    /**
     * @var mixed $firstOperent
     */
    private $firstOperent;
    /**
     * @var mixed $secondOperent
     */
    private $secondOperent;
    /**
     * @var string $operator
     */
    private $operator;

    /**
     * EmojiCalculatorService constructor.
     */
    public function __construct()
    {
        $this->expression = '';
    }

    public function calculate(string $text){
        $this->expression = json_encode(strtolower($text));
        return $this->emojiExpression();

    }

    private function emojiExpression(){
        $output_array = array();
        if(preg_match('/([0-9]+)[\s-]*(\\\u[0-9a-f]{4}\\\u[0-9a-f]{4})[\s-]*([0-9]+)/', $this->expression, $output_array)>0){
            $this->firstOperent = $output_array[1]??'';
            $this->secondOperent = $output_array[3]??'';
            $this->operator = $output_array[2]??'';
        }elseif(preg_match('/([0-9]+)[\s-]*(u\+[0-9a-fA-F]{5})[\s-]*([0-9]+)/', $this->expression, $output_array)>0){
            $this->firstOperent = $output_array[1]??'';
            $this->secondOperent = $output_array[3]??'';
            $this->operator = $output_array[2]??'';
        }else{
            return  $this->expression;
        }
        return $this->calculator();
    }

    private function calculator(){
        switch($this->operator){
            case '\\ud83d\\udc7d':
            case 'u+1f47d':
                return $this->firstOperent + $this->secondOperent;
            case '\\ud83d\\udc80':
            case 'u+1f480':
                return $this->firstOperent - $this->secondOperent;
            case '\\ud83d\\udc7b':
            case 'u+1f47b':
                return $this->firstOperent * $this->secondOperent;
            case '\\ud83d\\ude31':
            case 'u+1f631':
                return $this->firstOperent / $this->secondOperent;
            default:
                return $this->operator;
        }
    }
    private function emoji_to_unicode($emoji) {
       $emoji = mb_convert_encoding($emoji, 'UTF-32', 'UTF-8');
       $unicode = strtoupper(preg_replace("/^[0]+/","U+",bin2hex($emoji)));
       return $unicode;
    }
}
