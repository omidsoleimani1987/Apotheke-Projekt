<?php

//in this class we just have sql queries to send to DB connction

class SetQuery extends DatabaseConnect {

    
    ///////////////// entrance code section /////////////////

    // send request to read the code from DB
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

    // sign up page , read usernames from DB:
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

    // sign up page , register usernames into DB:
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

    // register excel file information into the "BUY" DB:
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

    //create a table with default structure in database:
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

    // search excel files from DB with year and month and company name:
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

    //here the functions for the adding Summe row and Summe columns 
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

    ///////////////// edit users position page section /////////////////
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

    ///////////////// see the created database from excel data section /////////////////
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