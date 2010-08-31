<?php


class Public_Bi2Dmap_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bi2Dmap_Item');
    }
}