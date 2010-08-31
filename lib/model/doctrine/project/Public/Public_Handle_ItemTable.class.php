<?php


class Public_Handle_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Handle_Item');
    }
}