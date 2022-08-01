<?php
namespace Jesse;

class TestClass
{
        public function AddTwoNumbers($a , $b)
        {
                $sum = $a+$b;

                echo $sum."\n";;
        }


        public function SubtractTwoNumber($a, $b)
        {
            if ($a > $b) {
                $diff = $a - $b;
                echo $diff."\n";;

            }elseif ($b > $a) {
                    $diff = $b-$a;
                    echo $diff."\n";;
            }else{

                $diff = $a - $b;
                echo $diff."\n";;

            }
        }
}
