<?php


class Public_ChecksumHistory_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_ChecksumHistory_Item');
    }
}