<?php


class Public_Subscription_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Subscription_Item');
    }
}