<?php

/*
 * Database Connector
 * 
 * Initial database connection for App uses
 */

/**
 * Description of DatabaseConnector
 *
 * @author dcai
 */
class DatabaseConnector {

    protected static $_init = false;
    protected static $_dataSources;

    /**
     * Loads connections configuration.
     *
     * @return void
     */
    protected static function _init() {
        if(DB_CONNECOTR == "classic"){
            require_once(LIBRARY_PATH . "/vendors/Database.class.php");
            self::$_dataSources = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$_dataSources->connect();
        }
        else{
            require_once(LIBRARY_PATH . "/vendors/DatabasePDO.class.php");
            self::$_dataSources = DatabasePDO::getInstance();
        }
        
        self::$_init = true;
    }

    public static function getDataSource() {
        if (empty(self::$_init)) {
            self::_init();
        }

        return self::$_dataSources;
    }

}
