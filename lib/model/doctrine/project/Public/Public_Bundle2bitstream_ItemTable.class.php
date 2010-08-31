<?php


class Public_Bundle2bitstream_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Bundle2bitstream_Item');
    }
}