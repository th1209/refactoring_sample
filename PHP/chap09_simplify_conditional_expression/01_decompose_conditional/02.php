<?php

if ($this->isNotSummer())
    $charge = $this->winterCharge($quantity);
else
    $charge = $this->summerCharge($quantity);

public function isNotSummer($date)
{
    return ($date.before(self::SUMMER_START) || $date.after(self::SUMMER_END));
}

public function winterCharge($quantity)
{
    return $quantity * $this->_winterRate;
}

public function summerCharge($quantity)
{
    return $quantity * $this->_summerRate;
}