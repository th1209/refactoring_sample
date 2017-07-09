<?php

//最終的なリファクタリング後のコード。
//呼び出し元のコードからNULL判定が消えており、グンと扱いやすくなっている。

//呼び出し元のコード
$customer = $this->_site->getCustomer();

$plan            = $customer->getPlan();
$customerName    = $customer->getName();
//オブジェクトをチェーンで呼び出す場合は、以下のリファクタリング結果を参照。
$weeksDelinquent = $customer->getHistory->getWeeksDelinquentInLastYear();


class Site
{
    //..変更なし
}

interface Nullable
{
    //..変更なし
}

class Customer implements Nullable
{
    //...変更なし
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

    public function getPlan()
    {
        return BillingPlan::basic();
    }

    public function getName()
    {
        return "occupant";
    }

    /**
     * 関連する他オブジェクトを返す必要がある場合、
     * Nullオブジェクトが関連するクラスのNullオブジェクトを返すようにする。
     *
     * @return NullPaymentHistory
     */
    public function getHistory()
    {
        return PaymentHistory::newNull();
    }
}

/**
 * Customerクラスから取得される関連クラスにも、
 * Nullオブジェクトパターンを適用。
 */
class PaymentHistory implements Nullable
{
    public function isNull()
    {
        return false;
    }

    public static function newNull()
    {
        return new NullPaymentHistory();
    }
}

class NullPaymentHistory extends PaymentHistory
{
    public function isNull()
    {
        return true;
    }

    public function getWeeksDelinquentInLastYear()
    {
        return 0;
    }
}