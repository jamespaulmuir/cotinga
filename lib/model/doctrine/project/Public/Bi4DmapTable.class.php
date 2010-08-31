<?php


class Bi4DmapTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bi4Dmap');
    }
}