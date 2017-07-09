<?php


class DateRange
{
    protected $start;

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

    /**
     * @param DateTime $arg
     */
    public function inRange($arg)
    {
        return
            (($arg == $this->getStart())
          || ($arg == $this->getEnd())
          || ($arg > $this->getStart() && $arg < $this->getEnd()));
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
    public function getFlowBetween (DateRange $range)
    {
        $result = 0;
        foreach ($this->_entries as $entry) {
            //更に、パラメータオブジェクトを使うと、新たに責務を抽出できる場合が!
            if ($range->inRange($entry->getDate())) {
                $result += $entry->getValue();
            }
        }
        return $result;
    }
}