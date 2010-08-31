<?php


class Public_Tasklistitem_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Tasklistitem_Item');
    }
}