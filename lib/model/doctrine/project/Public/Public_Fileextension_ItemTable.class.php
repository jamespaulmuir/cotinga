<?php


class Public_Fileextension_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Fileextension_Item');
    }
}