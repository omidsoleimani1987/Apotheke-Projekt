<?php

class TableInfo extends SetQuery {

    public $tableArray;

    function __construct($tableName) {
        $this->tableArray = $this->readAllMed($tableName);
    }
}