<?php


class ItemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Item');
    }

    public function getWithMetadata($id)
    {
        return $this->createQuery('i')
            ->leftJoin('i.Metadatavalues m')
            ->leftJoin('m.Metadatafieldregistry r')
            ->where('i.item_id = ?',$id)
        ->fetchOne();
    }
}