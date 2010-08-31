<?php


class Bi2DisTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bi2Dis');
    }
}