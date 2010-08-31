<?php


class Public_Community2collection_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Community2collection_Item');
    }
}