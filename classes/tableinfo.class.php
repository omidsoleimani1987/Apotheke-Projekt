<?php
/**
 * this class is used for the PDF creation and by initializing the class it reads all the records of table related to the table name passed throw the function as parameter
 */
class TableInfo extends SetQuery {

    public $tableArray;
     /**
      * reads all the records of the table
      *
      * @param string $tableName
      */
    function __construct($tableName) {
        $this->tableArray = $this->readAllMed($tableName);
    }
}