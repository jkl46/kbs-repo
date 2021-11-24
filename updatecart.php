<?php
include "session.php";
include "cartfunctions.php";

if(isset($_GET['stockItemID']) && isset($_GET['method'])){
    $stockItemID = $_GET['stockItemID'];
    $method = $_GET['method'];
    $setAmount = $_GET['setAmount'];
    $cart = getCart();

    if(array_key_exists($stockItemID, $cart)){
        if($method == 'increase'){
            $cart[$stockItemID]++;
            $_SESSION['cart'] = $cart;
            return 0;
        } elseif($method == 'decrease'){
            if($cart[$stockItemID] <= 1){
                unset($cart[$stockItemID]);
            } else {
                $cart[$stockItemID]--;
            }
            $_SESSION['cart'] = $cart;
            return 0;
        } elseif($method == 'set'){
            $cart[$stockItemID] = $setAmount;
            $_SESSION['cart'] = $cart;
            return 0;
        } elseif($method == 'remove'){
            unset($cart[$stockItemID]);
            $_SESSION['cart'] = $cart;
            return 0;
        }
    } else{
        return 1;
    }
}


?>