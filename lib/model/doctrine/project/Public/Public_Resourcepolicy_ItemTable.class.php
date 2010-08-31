<?php


class Public_Resourcepolicy_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Resourcepolicy_Item');
    }
}