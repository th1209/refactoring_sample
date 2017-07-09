<?php

protected function checkSecurity(array $peopleNames)
{
    //ロジック部分をメソッドに切り出す
    $found = $this->findMiscreant();
    $this->someLaterCode($found);
}

protected function findMiscreant(array $peopleNames)
{
    //以下のように、早期リターン方式に直して、フラグ用変数を削除
    for ($i = 0; $i < count($peopleNames) ;$i++) {
        if ($peopleNames[$i] == 'Don') {
            $this->sendAlert();
            return 'Don';
        }
        if ($peopleNames[$i] == 'Jhon') {
            $this->sendAlert();
            return 'Jhon';
        }
    }
    return '';
}