<?php


class communitiesComponents extends sfComponents
{

    public function executeRecentSubmissionsForCommunity()
    {
        $items_result = Doctrine::getTable('Community')->getRecentItems($this->community_id);

        $grouped_items = array();

        foreach($items_result as $item){
            $date = MetadataFormatFilter::dateFormat($item->metadata['dc.date.available'][0]);
            $grouped_items[$date][] = $item;
        }

        krsort($grouped_items);
        $this->items = $grouped_items;

        
    }
}