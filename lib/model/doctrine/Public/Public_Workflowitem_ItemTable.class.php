<?php


class Public_Workflowitem_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_Workflowitem_Item');
    }
}