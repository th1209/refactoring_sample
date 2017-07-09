<?php

/**
 * 表明(Assertion)の導入例。
 * 各従業員に対する支出上限を求めるメソッドを想定する。
 * サンプルの仮定を以下に示す
 *
 * ・Employeeクラスは、自身への支出上限を持つ
 * ・優先プロジェクトに配備されていた場合、そのプロジェクトが規定された支出上限を使うこともできる
 *  -> いずれか一方の情報は、必ず保持していないといけない
 */
class Employee
{
    const NULL_EXPENSE = -1.0;

    /**  @var float $_expenseLimit */
    private $_expenseLimit;

    /**  @var Project $_primaryProject */
    private $_primaryProject;

    public function getExpenseLimit()
    {
        return ($this->_expenseLimit != self::NULL_EXPENSE)
            ? $this->_expenseLimit
            : $this->_primaryProject->getMemberExpenseLimit();
    }
}

