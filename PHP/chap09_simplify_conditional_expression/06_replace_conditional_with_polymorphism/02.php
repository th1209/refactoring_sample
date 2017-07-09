<?php

class Employee
{
    /**  @var EmployeeType $_type */
    protected $_type;

    public function payAmount()
    {
        return $this->_type.payAmount();
    }

    //その他、各種getメソッドを追加...
}

abstract class EmployeeType
{
    public abstract function payAmount(Employee $emp);
}

class Engineer extends EmployeeType
{
    public function payAmount(Employee $emp)
    {
        return $emp.getMonthlySalaray();
    }
}

class Salesman extends EmployeeType
{
    public function payAmount(Employee $emp)
    {
        return $emp.getMonthlySalaray() + $emp.getCommision();
    }
}


class Manager extends EmployeeType
{
    public function payAmount(Employee $emp)
    {
        return $emp.getMonthlySalaray() + $emp.getBonus();
    }
}