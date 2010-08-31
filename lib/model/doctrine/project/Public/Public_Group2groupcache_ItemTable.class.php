<?php


class Public_Group2groupcache_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Group2groupcache_Item');
    }
}