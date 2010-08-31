<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Public_Bi2Dmap_Item', 'doctrine');

/**
 * BasePublic_Bi2Dmap_Item
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $map_id
 * @property integer $item_id
 * @property integer $distinct_id
 * @property Public_Bi2Dis_Item $Public_Bi2Dis_Item
 * @property Public_Item_Item $Public_Item_Item
 * 
 * @method integer             getMapId()              Returns the current record's "map_id" value
 * @method integer             getItemId()             Returns the current record's "item_id" value
 * @method integer             getDistinctId()         Returns the current record's "distinct_id" value
 * @method Public_Bi2Dis_Item  getPublicBi2DisItem()   Returns the current record's "Public_Bi2Dis_Item" value
 * @method Public_Item_Item    getPublicItemItem()     Returns the current record's "Public_Item_Item" value
 * @method Public_Bi2Dmap_Item setMapId()              Sets the current record's "map_id" value
 * @method Public_Bi2Dmap_Item setItemId()             Sets the current record's "item_id" value
 * @method Public_Bi2Dmap_Item setDistinctId()         Sets the current record's "distinct_id" value
 * @method Public_Bi2Dmap_Item setPublicBi2DisItem()   Sets the current record's "Public_Bi2Dis_Item" value
 * @method Public_Bi2Dmap_Item setPublicItemItem()     Sets the current record's "Public_Item_Item" value
 * 
 * @package    dspace
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePublic_Bi2Dmap_Item extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('public.bi_2_dmap');
        $this->hasColumn('map_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('item_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('distinct_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Public_Bi2Dis_Item', array(
             'local' => 'distinct_id',
             'foreign' => 'distinct_id'));

        $this->hasOne('Public_Item_Item', array(
             'local' => 'item_id',
             'foreign' => 'item_id'));
    }
}