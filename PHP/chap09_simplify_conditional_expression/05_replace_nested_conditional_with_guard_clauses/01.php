<?php

public function getPayAmount()
{
    $result = 0.0;

    //メソッドが、以下のような処理をしている
    //・多段ネスト
    //・レアケースのチェックをメソッド冒頭で行っている
    if ($this->_isDead) $result = $this->deadAmount();
    else {
        if ($this->_isSeparated) $result = $this->separetedAmount();
        else {
            if ($this->_isRetired) $result = $this->retiredAmount();
            else $result = $this->normalPayAmount();
        }
    }

    return $result;
}