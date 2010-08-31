<?php


class Public_Bitstream_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bitstream_Item');
    }
}