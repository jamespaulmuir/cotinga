<?php


class Public_Communities2item_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Communities2item_Item');
    }
}