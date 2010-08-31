<?php


class Public_Epersongroup2eperson_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Epersongroup2eperson_Item');
    }
}