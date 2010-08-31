<?php


class Public_Bi4Dis_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bi4Dis_Item');
    }
}