<?php


class Public_Bundle_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bundle_Item');
    }
}