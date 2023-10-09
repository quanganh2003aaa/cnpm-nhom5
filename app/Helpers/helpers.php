<?php
use App\Models\Product;

if(! function_exists('user') )
{

        function countCart()
    {
        if(Auth::user()->cart != null){
            $carts = Auth::user()->cart;
            $carts = json_decode($carts);
            $pros = 0;
            foreach ($carts as $value) {
                $pros += $value->sol;
            }
            return $pros;
        }

    }

    function cartData()
    {
        if(Auth::user()->cart != null){
            $carts = Auth::user()->cart;
            $carts = json_decode($carts);
            $i = 0;
            $pros= [];
            foreach ($carts as $value) {
                array_push($pros, $value);
                $i++;
                if ($i==5) {
                    break;
                }
            }
            return $pros;
        }
    }

    function sumPrice()
    {
        if(Auth::user()->cart != null){
            $carts = Auth::user()->cart;
            $pros = json_decode($carts);
            $sum = 0;
            foreach ($pros as $value) {
                $sum=$value->priceProduct*$value->sol + $sum;
            }
            return $sum;
        }
    }

}




