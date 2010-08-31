<?php


class Public_Metadatavalue_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Metadatavalue_Item');
    }
}