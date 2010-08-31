<?php


class Public_Bi4Dmap_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bi4Dmap_Item');
    }
}