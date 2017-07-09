<?php

if ($date.before(self::SUMMER_START) || $date.after(self::SUMMER_END))
    $charge = $quantity * $this->_winterRate + $this->_winterServiceCharge;
else
    $charge = $quantity * $this->_summerRate;