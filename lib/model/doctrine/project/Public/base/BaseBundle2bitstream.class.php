<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Bundle2bitstream', 'doctrine');

/**
 * BaseBundle2bitstream
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $bundle_id
 * @property integer $bitstream_id
 * @property Bundle $Bundle
 * @property Bitstream $Bitstream
 * 
 * @method integer          getId()           Returns the current record's "id" value
 * @method integer          getBundleId()     Returns the current record's "bundle_id" value
 * @method integer          getBitstreamId()  Returns the current record's "bitstream_id" value
 * @method Bundle           getBundle()       Returns the current record's "Bundle" value
 * @method Bitstream        getBitstream()    Returns the current record's "Bitstream" value
 * @method Bundle2bitstream setId()           Sets the current record's "id" value
 * @method Bundle2bitstream setBundleId()     Sets the current record's "bundle_id" value
 * @method Bundle2bitstream setBitstreamId()  Sets the current record's "bitstream_id" value
 * @method Bundle2bitstream setBundle()       Sets the current record's "Bundle" value
 * @method Bundle2bitstream setBitstream()    Sets the current record's "Bitstream" value
 * 
 * @package    dspace
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBundle2bitstream extends BaseDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('public.bundle2bitstream');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
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
        $this->hasColumn('bitstream_id', 'integer', 4, array(
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
        $this->hasOne('Bundle', array(
             'local' => 'bundle_id',
             'foreign' => 'bundle_id'));

        $this->hasOne('Bitstream', array(
             'local' => 'bitstream_id',
             'foreign' => 'bitstream_id'));
    }
}