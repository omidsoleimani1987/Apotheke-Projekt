<?php

/**
 * Undocumented class
 */
class DatabaseConnect {
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $databaseName = "wifi";
    /**
     * Undocumented function
     *
     * @return void
     */
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