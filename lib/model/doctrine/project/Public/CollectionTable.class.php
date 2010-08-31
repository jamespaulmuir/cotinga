<?php


class CollectionTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Collection');
    }


    public function getWithItems($id)
    {
        return $this->createQuery('col')
                ->leftJoin('col.Items i')
                ->leftJoin('i.Metadatavalues m')
                ->where('col.collection_id = ?', $id)
                ->fetchOne();
    }
}