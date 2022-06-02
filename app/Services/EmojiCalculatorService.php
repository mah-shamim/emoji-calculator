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

    /**
     * @param string $text
     * @return array
     */
    public function calculate(string $text){
        $this->expression = (strtolower($text));
        return $this->emojiExpression();

    }

    /**
     * @return array
     */
    private function emojiExpression(): array
    {
        $output_array = array();
        if(preg_match('/([0-9]+)[\s-]*(u\+[0-9a-fA-F]{5}|👽|💀|👻|😱|alien|skull|ghost|scream)[\s-]*([0-9]+)/i', $this->expression, $output_array)>0){
            $this->firstOperent = $output_array[1]??'';
            $this->secondOperent = $output_array[3]??'';
            $this->operator = $output_array[2]??'';
        }else{
            $this->firstOperent = $output_array[1]??'';
            $this->secondOperent = $output_array[3]??'';
            $this->operator = $output_array[2]??'';
        }
        return $this->calculator();
    }

    /**
     * @return array
     */
    private function calculator(): array
    {
        $result = array();
        $result['operation'] = '';
        $result['explanation'] = '';
        $result['result'] = '';

        switch($this->operator){
            case '\\ud83d\\udc7d':
            case '👽':
            case 'alien':
            case 'u+1f47d':
                {
                    $result['operation'] = 'Addition';
                    $result['result'] = $this->firstOperent + $this->secondOperent;
                    $result['explanation'] = $this->firstOperent .' + '. $this->secondOperent .' = '. $result['result'];
                    break;
                }
            case '\\ud83d\\udc80':
            case '💀':
            case 'skull':
            case 'u+1f480':
                {
                    $result['operation'] = 'Subtraction';
                    $result['result'] = $this->firstOperent - $this->secondOperent;
                    $result['explanation'] = $this->firstOperent .' - '. $this->secondOperent .' = '. $result['result'];
                    break;
                }
            case '\\ud83d\\udc7b':
            case '👻':
            case 'ghost':
            case 'u+1f47b':
                {
                    $result['operation'] = 'Multiplication';
                    $result['result'] = $this->firstOperent * $this->secondOperent;
                    $result['explanation'] = $this->firstOperent .' X '. $this->secondOperent .' = '. $result['result'];
                    break;
                }
            case '\\ud83d\\ude31':
            case '😱':
            case 'scream':
            case 'u+1f631':
                {
                    $result['operation'] = 'Division';
                    $result['result'] = $this->firstOperent / $this->secondOperent;
                    $result['explanation'] = $this->firstOperent .' / '. $this->secondOperent .' = '. $result['result'];
                    break;
                }
            default:
                {
                    $result['operation'] = 'INVALID';
                    $result['result'] = 'N/A';
                    $result['explanation'] = 'Invalid Expression';
                    break;
                }
        }
        return $result;
    }
}
