<?php

class Employee
{
    public function payAmount()
    {
        switch ($this->getType()) {
            case EmployeeType::ENGINEER:
                return $this->_monthlySalary;
            case EmployeeType::SALESMAN:
                return $this->_monthlySalary + $this->_commission;
            case EmployeeType::MANAGER:
                return $this->_monthlySalary + $this->_bonus;
            default:
                throw new \RuntimeException("不正な従業員");
        }
    }
}

class EmployeeType
{
    const ENGINEER = 0;
    const SALESMAN = 1;
    const MANAGER = 2;
}
