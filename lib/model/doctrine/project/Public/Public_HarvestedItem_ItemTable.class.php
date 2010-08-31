<?php


class Public_HarvestedItem_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_HarvestedItem_Item');
    }
}