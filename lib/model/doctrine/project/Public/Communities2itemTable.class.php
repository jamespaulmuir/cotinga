<?php


class Communities2itemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Communities2item');
    }
}