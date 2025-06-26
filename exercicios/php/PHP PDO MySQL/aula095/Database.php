<?php

namespace sys4soft;

use PDO;
use PDOException;
use stdClass;

class Database
{

    //properties
    private $_host;
    private $_database;
    private $_username;
    private $_password;
    private $return_type;

    public function __construct($cfg_options, $return_type = 'object')
    {
        //set connection configs
        $this->_host = $cfg_options['host'];
        $this->_database = $cfg_options['database'];
        $this->_username = $cfg_options['username'];
        $this->_password = $cfg_options['password'];

        //sets the return type
        if (!empty($return_type && $return_type == 'object')) {
            $this->return_type = PDO::FETCH_OBJ;
        } else {
            $this->return_type = PDO::FETCH_ASSOC;
        }
    }

    public function execute_query($sql, $parameters = null)
    {
        //execute a query with results

        // connection
        $connection = new PDO(
            'mysql:host=' . $this->_host . ';dbname=' . $this->_database,
            $this->_username,
            $this->_password,
            array(PDO::ATTR_PERSISTENT => true)
        );

        $results = null;
        try {
            $db = $connection->prepare($sql);
            if (!empty($parameters)) {
                $db->execute($parameters);
            } else {
                $db->execute();
            }
            $results = $db->fetchAll($this->return_type);
        } catch (PDOException $err) {

            // close connection
            $connection = null;

            // return error
            return $this->_result('error', $err->getMessage(), $sql, null, 0, null);
        }

        // close connection
        $connection = null;

        // return results
        return $this->_result('sucess', 'sucess', $sql, $results, $db->rowCount(), null);
    }

    public function execute_non_query($sql, $parameters = null)
    {
        //execute a query without results

        // connection
        $connection = new PDO(
            'mysql:host=' . $this->_host . ';dbname=' . $this->_database,
            $this->_username,
            $this->_password,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // init transaction
        $connection->beginTransaction();

        // prepare and execute the query
        try {
            $db = $connection->prepare($sql);
            if (!empty($parameters)) {
                $db->execute($parameters);
            } else {
                $db->execute();
            }

            //last inserted id
            $last_inserted_id = $connection->lastInsertId();

            // finish transaction
            $connection->commit();
        } catch (PDOException $err) {

            // undo all sql operations on error
            $connection->rollBack();

            // close connection
            $connection = null;

            // return error
            return $this->_result('error', $err->getMessage(), $sql, null, 0, null);
        }
        
        // close connection
        $connection = null;

        // return results
        return $this->_result('sucess', 'sucess', $sql, null, $db->rowCount(), $last_inserted_id);
    }

    private function _result($status, $message, $sql, $results, $affected_rows, $last_id)
    {
        $temp = new stdClass();
        $temp->status = $status;
        $temp->message = $message;
        $temp->sql = $sql;
        $temp->results = $results;
        $temp->affected_rows = $affected_rows;
        $temp->last_id = $last_id;

        return $temp;
    }
}
