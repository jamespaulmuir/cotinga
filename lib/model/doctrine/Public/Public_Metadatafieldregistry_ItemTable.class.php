<?php


class Public_Metadatafieldregistry_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Metadatafieldregistry_Item');
    }
}