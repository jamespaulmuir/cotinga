<?php


class itemsComponents extends sfComponents
{

    public function executeRecentSubmissions()
    {
        $items = Doctrine::getTable('Item')
            ->createQuery('i')
             ->select('i.item_id')
            ->leftJoin('i.Metadatavalues m')
            ->leftJoin('m.Metadatafieldregistry r')
            ->where('r.element = ? and r.qualifier = ?', array('date','available'))
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
            ->execute();

        $grouped_items = array();

        foreach($items_result as $item){
            $date = MetadataFormatFilter::dateFormat($item->metadata['dc.date.available'][0]);
            $grouped_items[$date][] = $item;
        }
        $this->items = $grouped_items;

    }
}