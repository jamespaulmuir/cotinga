<?php


class Public_Epersongroup2workspaceitem_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Epersongroup2workspaceitem_Item');
    }
}