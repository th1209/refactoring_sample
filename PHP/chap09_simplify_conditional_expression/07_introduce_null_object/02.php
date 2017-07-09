<?php

//リファクタリング途中のコード。
//Nullオブジェクトの導入と、isNullメソッドによる判定置き換えを行う

/**
 * Nullチェックを行っているコード。
 * nullチェックをisNullメソッド呼び出しに置換。
 */
$customer = $this->_site->getCustomer();

if ($customer.isNull()) $plan = BillingPlan::basic();
else                    $plan = $customer->getPlan();

if ($customer.isNull()) $customerName = "occupant";
else                    $customerName = $customer->getName();

if ($customer.isNull()) $weeksDelinquent = 0;
else                    $weeksDelinquent = $customer->getHistory->getWeeksDelinquentInLastYear();


class Site
{
    public function getCustomer()
    {
        return (! is_null($this->_customer))
            ? $this->_customer
            : Customer::newNull();
    }
}

/**
 * Nullableインタフェースを導入し、
 * 以下2メソッドの実装を必須にする。
 * ・自身がNullであるかどうかを判定するメソッド
 * ・Nullオブジェクトのファクトリメソッド
 */
interface Nullable
{
    /**
     * @return bool
     */
    public function isNull();

    /**
     * @return mixed Nullであることを示すインスタンス
     */
    public static function newNull();
}

class Customer implements Nullable
{
    public function isNull()
    {
        return false;
    }

    public static function newNull()
    {
        return new NullCustomer();
    }

   //...その他メソッド
}

/**
 * 以下のようなNullオブジェクトクラスを新規に導入。
 */
class NullCustomer extends Customer
{
    public function isNull()
    {
        return true;
    }
}