<?php


class Public_Item2bundle_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Item2bundle_Item');
    }
}