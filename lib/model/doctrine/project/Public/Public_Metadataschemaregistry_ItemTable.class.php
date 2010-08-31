<?php


class Public_Metadataschemaregistry_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Metadataschemaregistry_Item');
    }
}