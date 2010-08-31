<?php


class Epersongroup2workspaceitemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Epersongroup2workspaceitem');
    }
}