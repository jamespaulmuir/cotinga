<?php


class Public_Collection_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Collection_Item');
    }
}