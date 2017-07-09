<?php

if ($this->isSpecialDeal()) {
    $total = $price * 0.95;
    $this->send();    //各条件分で、重複する処理がある
} else {
    $total = $price * 0.98;
    $this->send();
}

//...