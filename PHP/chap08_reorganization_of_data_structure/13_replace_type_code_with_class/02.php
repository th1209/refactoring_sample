<?php

class Person
{
//    const O  = 0;
//    const A  = 1;
//    const B  = 2;
//    const AB = 3;

    /**
     * @var BloodGroup $_bloodGroup
     */
    protected $_bloodGroup;

    public function __construct($bloodGroup = null)
    {
        if ($bloodGroup instanceof BloodGroup) $this->_bloodGroup = $bloodGroup;
    }

    public function setBloodGroup(BloodGroup $bloodGroup)
    {
        $this->_bloodGroup = $bloodGroup;
    }

    public function getBloodGroup()
    {
        return $this->_bloodGroup;
    }

//    public function setBloodGroup($bloodGroup)
//    {
//        $this->_bloodGroup = $bloodGroup;
//    }
//
//    public function getBloodGroup()
//    {
//        return $this->_bloodGroup;
//    }
}

//class BloodGroup
//{
//    //public static $o = new BloodGroup(0);
//
//    public static $o;
//    public static $a;
//    public static $b;
//    public static $ab;
//
//    private static $_values = [self::$o];
//
//    /**
//     * @var BloodGroup $_bloodGroup
//     */
//    protected $_bloodGroup;
//
//    public function __construct($bloodGroup = null)
//    {
//        if ($bloodGroup instanceof BloodGroup) $this->_bloodGroup = $bloodGroup;
//    }
//
//    public function setBloodGroup(BloodGroup $bloodGroup)
//    {
//        $this->_bloodGroup = $bloodGroup;
//    }
//
//    public function getBloodGroup()
//    {
//        return $this->_bloodGroup;
//    }

//    public function setBloodGroup($bloodGroup)
//    {
//        $this->_bloodGroup = $bloodGroup;
//    }
//
//    public function getBloodGroup()
//    {
//        return $this->_bloodGroup;
//    }
//}

