<?php


class Public_CommunityItemCount_ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Public_CommunityItemCount_Item');
    }
}