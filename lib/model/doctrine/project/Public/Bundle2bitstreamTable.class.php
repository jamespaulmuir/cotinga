<?php


class Bundle2bitstreamTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bundle2bitstream');
    }
}