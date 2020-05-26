<?php

class DatabaseConnect {

    private $host = "188.121.44.188:3306";
    private $username = "omidsoleimani";
    private $password = "omid123456";
    private $databaseName = "wienerberg_apotheke";

    protected function connect() {
      //data source name dsn
      //we define what kind of db we use which is mysql
      //we define what sort of host we use from above 
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->databaseName;
        
        //we can name pdo as conn like always
        $pdo = new PDO($dsn, $this->username, $this->password);
        
        //we can set this attribute some where else!
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo; 
    }
}