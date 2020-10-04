<?php

namespace App\BalancedBrackets;

/**
 * PHP Check If Parentheses Are Balanced
 */
class Brackets
{
    private $data;

    public $bracketMap;

    public function __construct()
    {
        $this->data = [];
    }

    public function addBracket($element)
    {
        array_push($this->data, $element);
    }

    public function popBracket()
    {
        array_pop($this->data);
    }
}

function doBracketsBalance($str)
{

    $str = str_split($str);

    $bracketMap = '{"(": ")","[": "]","{": "}"}';
    $bracketMap = json_decode($bracketMap);

    // Creating Stack
    $stack = new Brackets();

    foreach ($str as $bracket) {

        // If the bracket is an opening bracket push it onto the stack
        if (!empty($bracketMap[$bracket])) {
            $stack->addBracket($bracket);
        } else {
            // If not, then pop a bracket off the stack.
            $poppedBracket = $stack->popBracket();

            // Check to see if the popped bracket is the matching bracket
            if ($bracketMap[$poppedBracket] !== $bracket) {
                return false;
            }
        }
    }
    return $stack->data->length === 0;
}

//doBracketsBalance('[()]{}{[()()]()}');
doBracketsBalance('[](){}');
