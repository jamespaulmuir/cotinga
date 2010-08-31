<?php


class Public_Group2group_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Group2group_Item');
    }
}