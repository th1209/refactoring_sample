<?php

/**
 * 勘定の各項目を表すクラス。
 */
class Entry
{
    /** @var double */
    protected $_value;

    /** @var DateTime */
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

/**
 * 勘定を表すクラス
 */
class Acount
{
    /**
     * 特定期間のキャッシュフローを求める。
     *
     * @param DateTime $start
     * @param Datetime $end
     * @return double
     */
    public function getFlowBetween ($start, $end)
    {
        $result = 0;
        foreach ($this->_entries as $entry) {
            //余談だが、phpではDateTimeオブジェクトを比較演算子で比較できる。
            //(厳密等価演算子を使うと、同一オブジェクトかどうかのチェックになるので注意)
            if (($entry->getDate() == $start)
             || ($entry->getDate() == $end)
             || ($entry->getDate() > $start && $entry->getDate() < $end)) {
                $result += $entry->getValue();
            }
        }
        return $result;
    }
}