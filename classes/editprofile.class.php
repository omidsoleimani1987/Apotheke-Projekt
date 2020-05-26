<?php

    class EditProfile extends SetQuery {
        
        public $username = '';
        public $firstname = '';
        public $lastname = '';
        public $email = '';
        public $password = '';
        public $repassword = '';
        public $error = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'repassword'=>'');

        // set the default values according to DB
        function __construct($data) {
            $this->username = $data;
            $userCurrent = $this->readUserInfo($data);
            $this->firstname = $userCurrent['firstname'];
            $this->lastname = $userCurrent['lastname'];
            $this->email = $userCurrent['email'];
            $this->password = $userCurrent['password'];
        }

        //validate inputs:
        public function validateUserInfo($data) {
            $postArray = $data;
            
            if($postArray['firstname'] != $this->firstname) {
                if(!preg_match("/^[a-zA-Z ]*$/", $postArray['firstname'])) {
                    $this->error['firstname'] = 'Im Feld "Vorname" werden nur Buchstaben akzeptiert.';
                } else {
                    $this->firstname = htmlspecialchars($postArray['firstname']);
                }
            }
            
            if($postArray['lastname'] != $this->lastname) {
                if(!preg_match("/^[a-zA-Z ]*$/", $postArray['lastname'])) {
                    $this->error['lastname'] = 'Im Feld "Nachname" werden nur Buchstaben akzeptiert.';
                } else {
                    $this->firstname = htmlspecialchars($postArray['lastname']);
                }
            }
            
            if($postArray['email'] != $this->email) {
                if(!filter_var(trim($postArray['email']), FILTER_VALIDATE_EMAIL)) {
                    $this->error['email'] = "Bitte geben Sie eine gültige E-Mail-Adresse an.";
                } else {
                    $this->email = htmlspecialchars($postArray['email']);
                }
            }

            if($postArray['password'] != '') {
                if(trim($postArray['password']) != trim($postArray['repassword'])) {
                    $this->error['repassword'] = "Ihre Passworteingaben stimmen nicht überein.";
                } else {
                    $this->password = password_hash($postArray['password'], PASSWORD_DEFAULT);
                }
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
            //the main function(s) of class - update user profile info into DB   
            if($check) {
                $result = $this->updateUserInfo($this->username, $this->firstname, $this->lastname, $this->email, $this->password);
                if($result == true) {
                    $_SESSION['firstname'] = $this->firstname;
                    header("Location: $app_path/app/home_page.php?message=Dein Profil wurde erfolgreich aktualisiert.&status=success");
                } else {
                    header("Location: $app_path/app/error_page.php?message=Etwas ist falsch gelaufen, bitte versuchen Sie noch einmal.");
                }
            }
        }
    }
