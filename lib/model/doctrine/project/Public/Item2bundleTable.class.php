<?php


class Item2bundleTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Item2bundle');
    }
}