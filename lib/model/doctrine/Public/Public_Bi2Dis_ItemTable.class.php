<?php


class Public_Bi2Dis_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bi2Dis_Item');
    }
}