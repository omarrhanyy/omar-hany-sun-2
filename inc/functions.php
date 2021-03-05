<?php

/**
 * Get number count of word
 * matches in array of words
 */
function getNumMatches($query, $words) {
    $count = 0;
    if (is_array($words) && count($words) > 0) {
        foreach ($words as $word) {
            if ($query == $word) {
                $count++;
            }
        }
    }
    return $count;
}

// $test_arr = ['ahmed', 'omar', 'ali', 'sami', 'ali', 'fahmy', 'nazmy', 'rasmy', 'ali'];
// echo getNumMatches('ali', $test_arr);

/**
 * Apply discount for product
 * price as follows:
 * 10% => price < 1000
 * 5%  => price >= 1000
 */
function getPriceWithDiscount($price) {
    $priceWithDiscount = $price;
    if ($price > 0) {
        if ($price >= 1000) {
            // price >= 1000 apply 5% discount
            $priceWithDiscount = $price - (($price * 5) / 100);
        } elseif ($price < 1000) {
            // price < 1000 apply 10% discount
            $priceWithDiscount = $price - (($price * 10) / 100);
        }
        return $priceWithDiscount;
    }
    // if price is less than 0 return 0
    return 0;
}

// echo getPriceWithDiscount(500) . '<hr>';
// echo getPriceWithDiscount(1000) . '<hr>';
// echo getPriceWithDiscount(5000) . '<hr>';