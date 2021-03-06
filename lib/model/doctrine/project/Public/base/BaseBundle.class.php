<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Bundle', 'doctrine');

/**
 * BaseBundle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $bundle_id
 * @property string $name
 * @property integer $primary_bitstream_id
 * @property Bitstream $PrimaryBitstream
 * @property Doctrine_Collection $Items
 * @property Doctrine_Collection $Bitstreams
 * @property Doctrine_Collection $Bundle2bitstream
 * @property Doctrine_Collection $Item2bundle
 * 
 * @method integer             getBundleId()             Returns the current record's "bundle_id" value
 * @method string              getName()                 Returns the current record's "name" value
 * @method integer             getPrimaryBitstreamId()   Returns the current record's "primary_bitstream_id" value
 * @method Bitstream           getPrimaryBitstream()     Returns the current record's "PrimaryBitstream" value
 * @method Doctrine_Collection getItems()                Returns the current record's "Items" collection
 * @method Doctrine_Collection getBitstreams()           Returns the current record's "Bitstreams" collection
 * @method Doctrine_Collection getBundle2bitstream()     Returns the current record's "Bundle2bitstream" collection
 * @method Doctrine_Collection getItem2bundle()          Returns the current record's "Item2bundle" collection
 * @method Bundle              setBundleId()             Sets the current record's "bundle_id" value
 * @method Bundle              setName()                 Sets the current record's "name" value
 * @method Bundle              setPrimaryBitstreamId()   Sets the current record's "primary_bitstream_id" value
 * @method Bundle              setPrimaryBitstream()     Sets the current record's "PrimaryBitstream" value
 * @method Bundle              setItems()                Sets the current record's "Items" collection
 * @method Bundle              setBitstreams()           Sets the current record's "Bitstreams" collection
 * @method Bundle              setBundle2bitstream()     Sets the current record's "Bundle2bitstream" collection
 * @method Bundle              setItem2bundle()          Sets the current record's "Item2bundle" collection
 * 
 * @package    dspace
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBundle extends BaseDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('public.bundle');
        $this->hasColumn('bundle_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('primary_bitstream_id', 'integer', 4, array(
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
        $this->hasOne('Bitstream as PrimaryBitstream', array(
             'local' => 'primary_bitstream_id',
             'foreign' => 'bitstream_id'));

        $this->hasMany('Item as Items', array(
             'refClass' => 'Item2bundle',
             'local' => 'bundle_id',
             'foreign' => 'item_id'));

        $this->hasMany('Bitstream as Bitstreams', array(
             'refClass' => 'Bundle2bitstream',
             'local' => 'bundle_id',
             'foreign' => 'bitstream_id'));

        $this->hasMany('Bundle2bitstream', array(
             'local' => 'bundle_id',
             'foreign' => 'bundle_id'));

        $this->hasMany('Item2bundle', array(
             'local' => 'bundle_id',
             'foreign' => 'bundle_id'));
    }
}