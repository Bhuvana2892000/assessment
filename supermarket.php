<?php

const ITEM_A = 3;
const A_SPL_PRICE = 130;

const ITEM_B = 2;
const B_SPL_PRICE = 45;

const APPLY_DISCOUNT_C_1 = 3;
const C_DISCOUNT_PRICE_1 = 50;

const APPLY_DISCOUNT_C_2 = 2;
const C_DISCOUNT_PRICE_2 = 38;


const D_SPL_PRICE = 15;


$unitPrice = [
    'A' => 50,
    'B' => 30,
    'C' => 20,
    'D' => 15,
    'E' => 5,
];

$cart = [
    'A' => 3,
    'B' => 2,
    'D' => 3,
    'C' => 3,
    'E' => 1
];

$total = 0;
$totalPrice = [];

foreach ($cart as $key => $value) {

    if ('A' === $key) {
        $item_a_Spl_Price = round($value / ITEM_A);
        $item_a_Normal_Price = $value % ITEM_A;
        $aTotal = $item_a_Spl_Price * A_SPL_PRICE + $item_a_Normal_Price * $unitPrice [$key];
        $totalPrice[$key] = $aTotal;
    }
    if ('B' === $key) {
        $item_b_Spl_Price = round($value / ITEM_B);
        $item_b_Normal_Price = $value % ITEM_B;
        $bTotal = $item_b_Spl_Price * B_SPL_PRICE + $item_b_Normal_Price * $unitPrice[$key];
        $totalPrice[$key] = $bTotal;
    }
    if ('C' === $key) {
        $applyDiscountItems = intdiv($value, APPLY_DISCOUNT_C_1);
        $itemWithNoDiscount = $value % APPLY_DISCOUNT_C_1;
        $cTotal = $applyDiscountItems * C_DISCOUNT_PRICE_1;
        $cTotal1 = 0;
        if ($itemWithNoDiscount === 2) {
            $applyDiscountitems2 = round($itemWithNoDiscount / APPLY_DISCOUNT_C_2);
            $itemWithNoDiscount2 = $applyDiscountItems % APPLY_DISCOUNT_C_2;
            $cTotal1 = $applyDiscountItems2 * C_DISCOUNT_PRICE_2;
        } else {
            $cTotal1 = $itemWithNoDiscount * $unitPrice[$key];
        }
        $totalPrice[$key] = $cTotal + $cTotal1;
    }

    if ('D' === $key) {
        $dTotal = 0;
        if (isset($cart['A']) && $cart['A'] >= $value) {
            $dTotal = $value * D_SPL_PRICE;
        }
        $totalPrice[$key] = $dTotal;
    }

    if ('E' === $key) {
        $eTotal = $unitPrice[$key];
        $totalPrice[$key] = $eTotal;
    }
}
print_r($totalPrice);
echo(array_sum(array_values($totalPrice)));
?>





