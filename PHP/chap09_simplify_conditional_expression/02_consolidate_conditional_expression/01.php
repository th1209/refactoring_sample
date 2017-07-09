<?php

/**
 * 傷病給付金額を計算して返す
 * 
 * @return float
 */
public function disabilityAmount()
{
    //メソッド冒頭のチェック処理でreturnする値が同じ点に注目！
    if ($this->seniority < 2) return 0;
    if ($this->_monthDisabled > 12) return 0;
    if ($this_isPartTime) return 0;
    
    //...処理が続く...
}