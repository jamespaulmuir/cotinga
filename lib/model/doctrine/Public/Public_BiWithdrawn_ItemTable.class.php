<?php


class Public_BiWithdrawn_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_BiWithdrawn_Item');
    }
}