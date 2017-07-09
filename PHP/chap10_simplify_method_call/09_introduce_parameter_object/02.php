<?php

//TODO immutableオブジェクトにしたい

/**
 * 2つのDateTimeオブジェクトを格納する、
 * パラメータオブジェクトを導入。
 * (ついでに、このようなクラスをRangeパターンと呼ぶらしい)
 */
class DateRange
{
    /** @var  DateTime $start */
    protected $start;

    /** @var  DateTime $end */
    protected $end;

    public function __construct($start, $end)
    {
        $this->_start = $start;
        $this->_end   = $end;
    }

    public function getStart()
    {
        return $this->_start;
    }

    public function getEnd()
    {
        $this->_end;
    }
}

/**
 * Entryクラスは変更なし
 */
class Entry
{
    protected $_value;

    protected $_chargeDate;

    public function __construct($value, DateTime $chargeDate)
    {
        $this->_value = $value;
        $this->_chargeDate = $chargeDate;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function getDate()
    {
        return $this->_chargeDate;
    }
}

class Acount
{
    //こんな形で、一つのパラメータオブジェクトに引数をまとめることができる
    public function getFlowBetween (DateRange $range)
    {
        $result = 0;
        foreach ($this->_entries as $entry) {
            if (($entry->getDate() == $range.getStart())
                || ($entry->getDate() == $range.getEnd())
                || ($entry->getDate() > $range.getStart() && $entry->getDate() < $range.getEnd())) {
                $result += $entry->getValue();
            }
        }
        return $result;
    }
}