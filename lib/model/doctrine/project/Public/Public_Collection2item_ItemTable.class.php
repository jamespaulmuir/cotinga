<?php


class Public_Collection2item_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Collection2item_Item');
    }
}