<?php


class Group2groupcacheTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Group2groupcache');
    }
}