<?php


class Public_Bitstreamformatregistry_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bitstreamformatregistry_Item');
    }
}