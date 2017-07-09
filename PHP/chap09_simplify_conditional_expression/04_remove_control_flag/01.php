<?php

/**
 * 以下のように、ローカル変数$foundを、
 * 結果の保持と継続フラグとして使っているメソッドがある
 * 
 * @param string[] $peopleNames
 */
protected function checkSecurity(array $peopleNames)
{
    $found = '';
    for ($i = 0; $i < count($peopleNames) ;$i++) {
        if (empty($found)) {
            if ($peopleNames[$i] == 'Don') {
                $this->sendAlert();
                $found = 'Don';
            }
            if ($peopleNames[$i] == 'Jhon') {
                $this->sendAlert();
                $found = 'Jhon';
            }
        }
    }
    $this->someLaterCode($found);
}