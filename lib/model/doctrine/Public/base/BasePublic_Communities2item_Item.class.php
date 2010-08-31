<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Public_Communities2item_Item', 'doctrine');

/**
 * BasePublic_Communities2item_Item
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $community_id
 * @property integer $item_id
 * @property Public_Community_Item $Public_Community_Item
 * @property Public_Item_Item $Public_Item_Item
 * 
 * @method integer                      getId()                    Returns the current record's "id" value
 * @method integer                      getCommunityId()           Returns the current record's "community_id" value
 * @method integer                      getItemId()                Returns the current record's "item_id" value
 * @method Public_Community_Item        getPublicCommunityItem()   Returns the current record's "Public_Community_Item" value
 * @method Public_Item_Item             getPublicItemItem()        Returns the current record's "Public_Item_Item" value
 * @method Public_Communities2item_Item setId()                    Sets the current record's "id" value
 * @method Public_Communities2item_Item setCommunityId()           Sets the current record's "community_id" value
 * @method Public_Communities2item_Item setItemId()                Sets the current record's "item_id" value
 * @method Public_Communities2item_Item setPublicCommunityItem()   Sets the current record's "Public_Community_Item" value
 * @method Public_Communities2item_Item setPublicItemItem()        Sets the current record's "Public_Item_Item" value
 * 
 * @package    dspace
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePublic_Communities2item_Item extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('public.communities2item');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('community_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Public_Community_Item', array(
             'local' => 'community_id',
             'foreign' => 'community_id'));

        $this->hasOne('Public_Item_Item', array(
             'local' => 'item_id',
             'foreign' => 'item_id'));
    }
}