<?php


class Public_Registrationdata_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Registrationdata_Item');
    }
}