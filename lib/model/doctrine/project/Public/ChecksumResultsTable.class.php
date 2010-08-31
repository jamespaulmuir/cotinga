<?php


class ChecksumResultsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ChecksumResults');
    }
}