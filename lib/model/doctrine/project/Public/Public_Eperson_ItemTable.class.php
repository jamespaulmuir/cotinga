<?php


class Public_Eperson_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Eperson_Item');
    }
}