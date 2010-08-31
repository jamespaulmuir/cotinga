<?php


class Public_Workspaceitem_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Workspaceitem_Item');
    }
}