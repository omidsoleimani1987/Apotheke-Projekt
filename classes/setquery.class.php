<?php

/**
 * this class is the only class that has access to the database class
 * the only class which contains all the sql queries
 */
class SetQuery extends DatabaseConnect {

    ///////////////// entrance code section /////////////////
    /**
     * this method returns the code from database
     *
     * @return hash
     */
    protected function getCode() {
        $sql = 'SELECT code FROM entrance_code';
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetch();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result['code'];

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
            
        }
    }

    ///////////////// sign up section /////////////////
    /**
     * gets all records of registered users from db
     *
     * @return array of all usernames
     */
    protected function readUsers() {
        $sql = 'SELECT username FROM users';
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * inserts the infos from user into db and then when there is no error to catch then returns success 
     *
     * @param string $par1 first name of user
     * @param string $par2 last name of user
     * @param string $par3 email address of user
     * @param string $par4 username of user
     * @param string $par5 password of user
     * @return void
     */
    protected function registerUser($par1, $par2, $par3, $par4, $par5) {
        $sql = 'INSERT INTO users (firstname, lastname, email, username, password) VALUES (?, ?, ?, ?, ?)';
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->prepare($sql);
            if(!$stmt) {
                throw new Exception('unable to prepare the statement');
            }
            $stmt->execute([$par1, $par2, $par3, $par4, $par5]);

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    ///////////////// login section /////////////////
    /**
     * reads all records from db such as first names, usernames, passwords and positions  
     *
     * @return array of users infos
     */

    // login page , read username and passwords from DB:
    protected function userLogin() {
        $sql = 'SELECT firstname, username, password, position FROM users';
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
        }
    }

    ///////////////// upload excel file section /////////////////

    /**
     * register excel file information into the "buy" table into the DB:
     *
     * @param string $par1
     * @param string $par2
     * @param string $par3
     * @param string $par4
     * @param string $par5
     * @param string $par6
     * @param string $par7
     * @param string $par8
     * @return void
     */
     protected function registerFile($par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8) {
        $sql = "INSERT INTO buy (username, years, months, company, arts, sendto, detail, ourfilename) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->prepare($sql);
            if(!$stmt) {
                throw new Exception('unable to prepare the statement');
            }
            $stmt->execute([$par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8]);

        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * create a table with default structure in database
     *
     * @param string $tableName
     * @return void
     */
    protected function createTable($tableName) {
        $sql = "CREATE TABLE $tableName (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pzn VARCHAR(255),
            Bezeichnung VARCHAR(255),
            Menge VARCHAR(255),
            Einheit VARCHAR(255),
            adler_k VARCHAR(255),
            billroth_k VARCHAR(255),
            citygate_k VARCHAR(255),
            hoffnung_k VARCHAR(255),
            retz_k VARCHAR(255),
            wienerberg_k VARCHAR(255),
            phönix_k VARCHAR(255),
            kwizda_k VARCHAR(255),
            herba_k VARCHAR(255),
            Summe_k VARCHAR(255),
            phönix_prozent VARCHAR(255),
            kwizda_prozent VARCHAR(255),
            herba_prozent VARCHAR(255),
            adler_v VARCHAR(255),
            billroth_v VARCHAR(255),
            citygate_v VARCHAR(255),
            hoffnung_v VARCHAR(255),
            retz_v VARCHAR(255),
            wienerberg_v VARCHAR(255),
            phönix_v VARCHAR(255),
            kwizda_v VARCHAR(255),
            herba_v VARCHAR(255),
            Summe_v VARCHAR(255),
            Ablauf VARCHAR(255),
            Viel VARCHAR(255),
            Kaput VARCHAR(255),
            Andere VARCHAR(255),
            Datum VARCHAR(255),
            Charge VARCHAR(255),
            register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true; 
            }

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * inserting the values into the table according to the excel file
     *
     * @param string $tableName
     * @param string $pzn
     * @param string $Bezeichnung
     * @param string $Menge
     * @param string $Einheit
     * @param int $adler_k
     * @param int $billroth_k
     * @param int $citygate_k
     * @param int $hoffnung_k
     * @param int $retz_k
     * @param int $wienerberg_k
     * @param int $phönix_k
     * @param int $kwizda_k
     * @param int $herba_k
     * @param string $phönix_prozent
     * @param string $kwizda_prozent
     * @param string $herba_prozent
     * @return void
    */
    protected function insertExcel($tableName, $pzn, $Bezeichnung, $Menge, $Einheit, $adler_k, $billroth_k, $citygate_k, $hoffnung_k, $retz_k, $wienerberg_k, $phönix_k, $kwizda_k, $herba_k, $phönix_prozent, $kwizda_prozent, $herba_prozent) {
        $sql = "INSERT INTO $tableName (pzn, Bezeichnung, Menge, Einheit, adler_k, billroth_k, citygate_k, hoffnung_k, retz_k, wienerberg_k, phönix_k, kwizda_k, herba_k, phönix_prozent, kwizda_prozent, herba_prozent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->prepare($sql);
            if(!$stmt) {
                throw new Exception('unable to prepare the statement');
            }
            $stmt->execute([$pzn, $Bezeichnung, $Menge, $Einheit, $adler_k, $billroth_k, $citygate_k, $hoffnung_k, $retz_k, $wienerberg_k, $phönix_k, $kwizda_k, $herba_k, $phönix_prozent, $kwizda_prozent, $herba_prozent]);

        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * inserting the last row as the sum row
     *
     * @param string $tableName
     * @return void
     */
    protected function insertSummeRow($tableName) {
        $sql = "INSERT INTO $tableName (Bezeichnung) VALUES ('Summe')";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->exec($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true; 
            }

        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    ///////////////// search database for excel file section /////////////////
    /**
     * search excel files from DB with year and month and company name
     *
     * @param string $par1
     * @param string $par2
     * @return array
     */
    protected function searchfile($par1, $par2) {
        $str = "'%" . $par2 . "%'";
        $sql = "SELECT id, username, years, months, company, arts, sendto, detail, ourstatus, lastedit FROM buy WHERE years=$par1 AND company LIKE $str ORDER BY lastedit DESC";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }
            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('Keine Ergebnisse gefunden');
            }
    
            return $result;
    
        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/searchfile_page.php?message=$message&status=fail");
        }
    }
    
    ///////////////// see the created database from excel data section /////////////////
    /**
     * reads the records of the table according to the given id
     *
     * @param int $id
     * @return array
     */
    protected function readInfo($id) {
        $sql = "SELECT id, username, years, months, company, arts, sendto, detail, ourstatus, lastedit FROM buy WHERE id=$id ORDER BY lastedit DESC";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }
            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('Keine Ergebnisse gefunden');
            }
    
            return $result;
    
        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/searchfile_page.php?message=$message&status=fail");
        }
    }

    /**
     * to get the table name
     *
     * @param int $id
     * @return string
     */
    protected function getTablename($id) {
        $sql = "SELECT ourfilename FROM buy where id=$id";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetch();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result['ourfilename'];

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * reads all the data (records) of the table
     *
     * @param string $tableName
     * @return array
     */
    protected function getTabledata($tableName) {
        $sql = "SELECT id, pzn, Bezeichnung, Menge, Einheit, adler_k, billroth_k, citygate_k, hoffnung_k, retz_k, wienerberg_k, phönix_k, kwizda_k, herba_k, Summe_k FROM $tableName";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    ///////////////// search Work page section /////////////////
    /**
     * reads all the data (records) of the table
     *
     * @param string $tableName
     * @return array
     */
    protected function readAllMed($tableName) {
        $sql = "SELECT * FROM $tableName";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * gets a single record of the table
     *
     * @param string $tableName
     * @param string $title
     * @return array
     */
    protected function getTitlename($tableName, $title) {
        $sql = "SELECT id, pzn, Bezeichnung, Menge, Einheit, Datum, Charge, Summe_k, Summe_v, register_date FROM $tableName WHERE Bezeichnung LIKE '%".$title."%'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('Keine Ergebnisse gefunden');
            }

            return $result;

        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/searchwork_page.php?message=$message&status=fail");
        }
    }

    /**
     * here the functions for the adding Sum columns
     *
     * @param string $tableName
     * @param int $id
     * @param int $rowSumme_k
     * @param int $rowSumme_v
     * @return void
     */
    protected function createSummeColumn($tableName, $id, $rowSumme_k, $rowSumme_v){
        //need to have true return
        $sql = "UPDATE $tableName SET Summe_k=$rowSumme_k, Summe_v=$rowSumme_v WHERE id=$id";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }
    
    /**
     * here the functions for the adding Sum row
     *
     * @param string $tableName
     * @param int $Adler_k
     * @param int $Billroth_k
     * @param int $Citygate_k
     * @param int $Hoffnung_k
     * @param int $Retz_k
     * @param int $Wienerberg_k
     * @param int $Phönix_k
     * @param int $Kwizda_k
     * @param int $Herba_k
     * @param int $Summe_k
     * @param int $Adler_v
     * @param int $Billroth_v
     * @param int $Citygate_v
     * @param int $Hoffnung_v
     * @param int $Retz_v
     * @param int $Wienerberg_v
     * @param int $Phönix_v
     * @param int $Kwizda_v
     * @param int $Herba_v
     * @param int $Summe_v
     * @return void
     */
    protected function createSummeRow($tableName, $Adler_k, $Billroth_k, $Citygate_k, $Hoffnung_k, $Retz_k, $Wienerberg_k, $Phönix_k, $Kwizda_k, $Herba_k, $Summe_k, $Adler_v, $Billroth_v, $Citygate_v, $Hoffnung_v, $Retz_v, $Wienerberg_v, $Phönix_v, $Kwizda_v, $Herba_v, $Summe_v) {
        $sql = "UPDATE $tableName SET adler_k=$Adler_k, billroth_k=$Billroth_k, citygate_k=$Citygate_k, hoffnung_k=$Hoffnung_k, retz_k=$Retz_k, wienerberg_k=$Wienerberg_k, phönix_k=$Phönix_k, kwizda_k=$Kwizda_k, herba_k=$Herba_k, Summe_k=$Summe_k, adler_v=$Adler_v, billroth_v=$Billroth_v, citygate_v=$Citygate_v, hoffnung_v=$Hoffnung_v, retz_v=$Retz_v, wienerberg_v=$Wienerberg_v, phönix_v=$Phönix_v, kwizda_v=$Kwizda_v, herba_v=$Herba_v, Summe_v=$Summe_v WHERE Bezeichnung='Summe'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    ///////////////// main page section /////////////////
    /**
     * read all the records of the table
     *
     * @param string $tableName
     * @param int $medId
     * @return array
     */
    protected function readAll($tableName, $medId) {
        $sql = "SELECT * FROM $tableName WHERE id=$medId";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetch();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * a single method to use frequently in main page for the values which have been changed
     *
     * @param string $tableName
     * @param int $medId
     * @param string $name
     * @param string $value
     * @return void
     */
    protected function insertPostInfo($tableName, $medId, $name, $value) {
        $sql = "UPDATE $tableName SET $name='$value' WHERE id=$medId";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    ///////////////// edit profile page section /////////////////
    /**
     * reads the users info from db
     *
     * @param string $data username 
     * @return array
     */
    protected function readUserInfo($data) {
        $sql = "SELECT firstname, lastname, email, password FROM users WHERE username='$data'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetch();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    /**
     * update the users info in db
     *
     * @param string $username
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $password
     * @return void
     */
    protected function updateUserInfo($username, $firstname, $lastname, $email, $password) {
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password' WHERE username='$username'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }

    ///////////////// see existing users section /////////////////
    /**
     * reads all records which are the signed up users 
     *
     * @return array
     */
    protected function readusersInfo() {
        $sql = "SELECT firstname, lastname, email, username, position FROM users";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        } 
    }

    ///////////////// icons section /////////////////
    /**
     * read the last record of the table
     *
     * @param string $tableName
     * @return array
     */
    protected function iconsInfo($tableName) {
        $sql = "SELECT adler_k, billroth_k, citygate_k, hoffnung_k, retz_k, wienerberg_k, phönix_k, kwizda_k, herba_k FROM $tableName WHERE Bezeichnung='Summe'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetch();
            if(!$result) {
                throw new Exception('unable to fetch from database');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        } 
    }

    ///////////////// change entrance code section /////////////////
    /**
     * this method insert the new code into the database
     *
     * @param string $code from user
     * @return void
     */
    protected function insertNewCode($code) {
        $sql = "UPDATE entrance_code SET code='$code' WHERE id=1";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
             
        }
    }
    ///////////////// see buy database section /////////////////
    /**
     * reads the records of the table and returns it as an array
     *
     * @return array
     */
    protected function readAllbuy() {
        $sql = "SELECT id, username, years, months, company, arts, sendto, detail, lastedit FROM buy ORDER BY lastedit DESC";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetchAll();
            if(!$result) {
                throw new Exception('Datenbank ist leer.');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
        } 
    }

    ///////////////// forget password section /////////////////
    /**
     * it delete the existing record from table to always have just one record of the same email address
     *
     * @param string $email
     * @return void
     */
    protected function deleteToken($email) {
        $sql = "DELETE FROM passreset WHERE email='$email'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
        }
    }
    /**
     * this method insert the token and the expire time and the email address of the user into the "passreset" table in database
     * 
     * @param string $email
     * @param string $selectorToken
     * @param string $expire
     * @return void
     */
    protected function insertToken($email, $selectorToken, $expire) {
        $sql = "INSERT INTO passreset (email, selector, expire) VALUES (?, ?, ?)";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->prepare($sql);
            if(!$stmt) {
                throw new Exception('unable to prepare the statement');
            }
            $stmt->execute([$email, $selectorToken, $expire]);

        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
        }
    }

    /**
     * reads the record from table according to the email address
     *
     * @param string $email
     * @return array
     */
    protected function readTokenAll($email) {
        $sql = "SELECT email, selector, expire FROM passreset WHERE email='$email'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }

            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            }

            $result = $stmt->fetch();
            if(!$result) {
                throw new Exception('Datenbank ist leer, bitte versuchen Sie noch einmal.');
            }

            return $result;

        } catch(Exception $err) {

            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
        } 
    }
    
    /**
     * update the users password with the new password into the users table 
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    protected function updateUserpassword($email, $password) {
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        try {
            $conn = $this->connect();
            if(!$conn) {
                throw new Exception('unable to connect to database');
            }
            $stmt = $conn->query($sql);
            if(!$stmt) {
                throw new Exception('unable to query to database');
            } else {
                return true;
            }
        } catch(Exception $err) {
            $message = $err->getMessage();
            header("Location: $app_path/app/error_page.php?message=$message");
        }
    }
}