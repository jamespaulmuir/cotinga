<?php


class Collection2itemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Collection2item');
    }
}