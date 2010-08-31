<?php


class Community2collectionTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Community2collection');
    }
}