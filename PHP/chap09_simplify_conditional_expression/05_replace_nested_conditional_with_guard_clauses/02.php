<?php

public function getPayAmount()
{
    //ガード節を導入して読みやすくする
    //※ガード節:レアケースのチェックとreturnを行う処理のこと
    if ($this->_isDead)      return $this->deadAmount();
    if ($this->_isSeparated) return $this->separetedAmount();
    if ($this->_isRetired)   return $this->retiredAmount();

    return $this->normalPayAmount();
}