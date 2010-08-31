<?php


class Public_MostRecentChecksum_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_MostRecentChecksum_Item');
    }
}