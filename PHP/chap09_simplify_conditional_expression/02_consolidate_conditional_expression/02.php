<?php

public function disabilityAmount()
{
    //一連のチェック処理をメソッドにまとめると、読みやすくなる
    if ($this->isNotEligibleForDisability()) return 0;

    //...処理が続く...
}

protected function isNotEligibleForDisability()
{
    return ($this->seniority < 2)
        || ($this->_monthDisabled > 12)
        || ($this->_isPartTime);
}