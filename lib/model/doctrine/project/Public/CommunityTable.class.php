<?php


class CommunityTable extends Doctrine_Table
{


    public function getRecentItems($community_id)
    {
        $items = Doctrine::getTable('Item')->createQuery('i')
           ->leftJoin('i.Communities c')
            ->select('i.item_id, c.community_id')
            ->leftJoin('i.Metadatavalues m')
            ->leftJoin('m.Metadatafieldregistry r')
            ->where('c.community_id = ? and r.element = ? and r.qualifier = ?', array($community_id, 'date','available'))
            ->orderBy('m.text_value desc')
            ->limit(sfConfig::get('app_nb_recent_submissions'))
            ->execute(array(), Doctrine::HYDRATE_ARRAY);

        $item_ids = array();
        
        foreach($items as $it){
            $item_ids[] = $it['item_id'];
        }
        $items_result = Doctrine::getTable('Item')
            ->createQuery('i')
            ->leftJoin('i.Metadatavalues m')
            ->leftJoin('m.Metadatafieldregistry r')
            ->whereIn('i.item_id', $item_ids)
            // sanity check
            ->limit(sfConfig::get('app_nb_recent_submissions'))
            ->execute();
        return $items_result;
    }

    public static function getInstance()
    {
        return Doctrine_Core::getTable('Community');
    }
}