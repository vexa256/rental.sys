<?php
namespace Jesse;

use Jesse\TestClass;

class TestClassTwo extends TestClass{


    public function MultiplyTwoNumbers($a , $b)
    {
            $prod = $a*$b;

            echo $prod."\n";
    }


}




TestClassTwo::MultiplyTwoNumbers(3, 4);
TestClass::AddTwoNumbers(67, 109);
