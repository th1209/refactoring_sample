<?php

class Employee
{
    const NULL_EXPENSE = -1.0;

    private $_expenseLimit;

    private $_primaryProject;

    public function getExpenseLimit()
    {
        //このメソッド呼び出しには、以下を前提とすることを、表明を使って明示。
        assert($this->_expenseLimit != self::NULL_EXPENSE || ! is_null($this->_primaryProject));

        return ($this->_expenseLimit != self::NULL_EXPENSE)
            ? $this->_expenseLimit
            : $this->_primaryProject->getMemberExpenseLimit();
    }
}

/**
 * メモ
 *
 * 表明を導入することによるメリット
 * ・メソッド冒頭に表明を置くことで、ソースの読み手にメソッドの前提条件を示す
 * ・表明を置くことで、デバッグ事による予期せぬ動作を気づきやすくする
 *   -> このメリットは、テストコードを書くことで代用できる
 *
 * 表明を導入した場合に起こりうる問題点
 * ・表明による似たようなチェック処理が、各メソッドに重複する。
 * ・チェック処理を増やすことによるパフォーマンス劣化
 *
 * その他tips
 * ・PHP7では、assertは言語構造になった。
 *   php.iniのzend.assertionsを-1にすることで、本番環境でassertの呼び出し箇所を排除することが可能。
 * ・assertの呼び出しでは、動作に必要なコードを入れないこと ex) 変数に代入しつつassertする
 * ・表明を使って読みやすいコードを書こう。和田卓人大先生の以下スライドも参考に...。
 *  [PHP7で堅牢なコードを書く - 例外処理、表明プログラミング、契約による設計 / PHP Conference 2016](https://speakerdeck.com/twada/php-conference-2016)
 */

