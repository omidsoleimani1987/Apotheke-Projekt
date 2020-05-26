<?php

class UserLogin extends SetQuery {
    
    public $username = '';
    public $password = '';
    public $error = array('username'=>'', 'password'=>'');

    //validate inputs:
    public function usernameValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['username'] = "Das Feld Vorname ist auszufüllen.";
        } else {
            $this->username = htmlspecialchars($data);
        }
    }

    public function passwordValidate($data) {
        if(empty($data) || trim($data) == '') {
            $this->error['password'] = 'Das Feld "Passwort" ist auszufüllen.';
        } else {
            $this->password = htmlspecialchars($data);
        }
    }

    // check the  errors, if there is none, then the main function(s) of class:
    public function checkError() {
        $check = true;
        $error = $this->error;
        foreach($error as $key=>$value) {
            if($value !== '') {
                echo '<h1 class="error"><i class="fas fa-exclamation-triangle"></i> Bitte überprüfen Sie Ihre Eingaben!</h1>';
                $check = false;
                break;
            }
        }

        //the main function(s) of class - read the users info for login and set the all session variables which we need later
        if($check) {
            $userrows = $this->checkLogin();
            for($i=0; $i<count($userrows); $i++) {
                if($userrows[$i]['username'] == $this->username && password_verify($this->password, $userrows[$i]['password'])) {
                    $_SESSION['login'] = 'success';
                    $_SESSION['firstname'] = $userrows[$i]['firstname'];
                    $_SESSION['username'] = $userrows[$i]['username'];
                    $_SESSION['userposition'] = $userrows[$i]['position'];
                    $_SESSION['libraryFilename'] = '';
                    $_SESSION['libraryFileExtension'] = '';
                    $_SESSION['libraryFilepath'] = '';
                    $_SESSION['fileTableName'] = '';
                    break;
                }
            }
            if( isset($_SESSION['login']) && isset($_SESSION['username']) && isset($_SESSION['userposition']) )  {
                header ("location: $app_path/app/home_page.php");
            } else {
                echo '<h1 class="error"><i class="fas fa-exclamation-triangle"></i> Der Benutzername oder das Passwort ist falsch.</h1>';
            }
        }
    }
    
    public function checkLogin() {
        $result = $this->userLogin();
        return $result;
    }

}