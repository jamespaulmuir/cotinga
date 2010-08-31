<?php


class Public_ChecksumResults_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_ChecksumResults_Item');
    }
}