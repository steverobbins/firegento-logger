<?php
/**
 * User: Christoph
 * Date: 31.03.12
 * Time: 20:17
 */
class Hackathon_Logger_Model_Db extends Zend_Log_Writer_Db
{
    /**
     * Database adapter instance
     * @var Zend_Db_Adapter
     */
    private $_db;

    /**
     * Name of the log table in the database
     * @var string
     */
    private $_table;

    /**
     * Relates database columns names to log data field keys.
     *
     * @var null|array
     */
    private $_columnMap;

    public function __construct($filename)
    {
        $resource = Mage::getSingleton('core/resource');
        $this->_db = $resource->getConnection('core_write');
        $this->_table = $resource->getTableName('hackathon_logger/logger');
        $this->_columnMap = array('severity' => 'priority', 'message' => 'message');
        parent::__construct($this->_db, $this->_table, $this->_columnMap);
    }

}
