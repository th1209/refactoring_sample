<?php

//配列を、意味を持つオブジェクトに置き換える
$row = new TeamPerformance();
$row.setName();
$row.setWins();

/**
 * 元々配列だったものを、以下の用にクラス化。
 * 単純なセッタ・ゲッタを用意する。
 */
class TeamPerformance
{
    protected $_name;
    protected $_wins;
    
    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setWins($wins)
    {
        $this->_wins = intval($wins);
    }

    public function getWins()
    {
        return $this->_wins;
    }
}

/**
 * オブジェクトによる配列の置き換えに関するメモ
 * ・実運用するコードだと、数次元に及ぶ連想配列を使うことが多いかと思う。
 * ・この場合、以下の用に対処すべきか...?
 *   ・まとめて取り扱った方が意味がある場合
 *   -> ひとまず一つの大きなオブジェクトで置き換える。
 *   ・連想配列に格納されるデータが大きい場合・意味に関連性のない情報をまとめて一つの配列に格納している時
 *   -> 全体を格納する一つのクラスと、各データの意味を表すクラスを複数作る。
 */