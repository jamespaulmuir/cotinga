<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Public_Item2bundle_Item', 'doctrine');

/**
 * BasePublic_Item2bundle_Item
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $item_id
 * @property integer $bundle_id
 * @property Public_Item_Item $Public_Item_Item
 * @property Public_Bundle_Item $Public_Bundle_Item
 * 
 * @method integer                 getId()                 Returns the current record's "id" value
 * @method integer                 getItemId()             Returns the current record's "item_id" value
 * @method integer                 getBundleId()           Returns the current record's "bundle_id" value
 * @method Public_Item_Item        getPublicItemItem()     Returns the current record's "Public_Item_Item" value
 * @method Public_Bundle_Item      getPublicBundleItem()   Returns the current record's "Public_Bundle_Item" value
 * @method Public_Item2bundle_Item setId()                 Sets the current record's "id" value
 * @method Public_Item2bundle_Item setItemId()             Sets the current record's "item_id" value
 * @method Public_Item2bundle_Item setBundleId()           Sets the current record's "bundle_id" value
 * @method Public_Item2bundle_Item setPublicItemItem()     Sets the current record's "Public_Item_Item" value
 * @method Public_Item2bundle_Item setPublicBundleItem()   Sets the current record's "Public_Bundle_Item" value
 * 
 * @package    dspace
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePublic_Item2bundle_Item extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('public.item2bundle');
        $this->hasColumn('id', 'integer', 4, array(
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
        $this->hasColumn('bundle_id', 'integer', 4, array(
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
        $this->hasOne('Public_Item_Item', array(
             'local' => 'item_id',
             'foreign' => 'item_id'));

        $this->hasOne('Public_Bundle_Item', array(
             'local' => 'bundle_id',
             'foreign' => 'bundle_id'));
    }
}