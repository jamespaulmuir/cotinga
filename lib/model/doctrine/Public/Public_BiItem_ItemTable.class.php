<?php


class Public_BiItem_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_BiItem_Item');
    }
}