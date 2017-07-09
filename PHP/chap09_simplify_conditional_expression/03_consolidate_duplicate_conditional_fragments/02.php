<?php

if ($this->isSpecialDeal()) {
    $total = $price * 0.95;
} else {
    $total = $price * 0.98;
}

//重複処理を条件分の外に切り出す
$this->send();

//...