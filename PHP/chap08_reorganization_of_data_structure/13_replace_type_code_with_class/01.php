<?php

class Person
{
    const O  = 0;
    const A  = 1;
    const B  = 2;
    const AB = 3;
    
    protected $_bloodGroup;
    
    public function __construct($bloodGroup = null)
    {
        if (! is_null($bloodGroup)) $this->_bloodGroup = $bloodGroup;
    }

    public function setBloodGroup($bloodGroup)
    {
        $this->_bloodGroup = $bloodGroup;
    }

    public function getBloodGroup()
    {
        return $this->_bloodGroup;
    }
}