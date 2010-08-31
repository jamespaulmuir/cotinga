<?php


class Bi2DmapTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bi2Dmap');
    }
}