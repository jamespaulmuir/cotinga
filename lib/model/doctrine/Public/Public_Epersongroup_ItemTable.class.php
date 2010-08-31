<?php


class Public_Epersongroup_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Epersongroup_Item');
    }
}