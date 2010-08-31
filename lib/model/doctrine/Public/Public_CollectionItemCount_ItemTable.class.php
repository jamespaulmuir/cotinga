<?php


class Public_CollectionItemCount_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_CollectionItemCount_Item');
    }
}