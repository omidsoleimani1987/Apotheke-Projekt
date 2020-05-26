<?php

    class UserSignup extends SetQuery {
        
        public $firstname = '';
        public $lastname = '';
        public $email = '';
        public $username = '';
        public $password = '';
        public $repassword = '';
        public $error = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'username'=>'', 'password'=>'', 'repassword'=>'');

        //validate inputs:
        public function firstnameValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['firstname'] = "Das Feld Vorname ist auszufüllen.";
            } elseif(!preg_match("/^[a-zA-Z ]*$/", $data)) {
                $this->error['firstname'] = 'Im Feld "Vorname" werden nur Buchstaben akzeptiert.';
            } else {
                $this->firstname = htmlspecialchars($data);
            }
        }

        public function lastnameValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['lastname'] = "Das Feld Nachname ist auszufüllen.";
            } elseif(!preg_match("/^[a-zA-Z ]*$/", $data)) {
                $this->error['lastname'] = 'Im Feld "Nachname" werden nur Buchstaben akzeptiert.';
            } else {
                $this->lastname = htmlspecialchars($data);
            }
        }

        public function emailValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['email'] = "Es muss eine E-Mail-Adresse angegeben werden.";
            } elseif(!filter_var(trim($data), FILTER_VALIDATE_EMAIL)) {
                $this->error['email'] = "Bitte geben Sie eine gültige E-Mail-Adresse an.";
            } else {
                $this->email = htmlspecialchars($data);
            }
        }

        public function usernameValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['username'] = 'Das Feld "Benutzername" ist auszufüllen.';
            } else {
                $this->username = htmlspecialchars($data);
                $usersresult = $this->getUsernames();
                for($i=0; $i<count($usersresult); $i++) {
                    if($usersresult[$i]['username'] == trim($data)) {
                        $this->error['username'] = 'Der gewählte Benutzername ist bereits vergeben.';
                        break;
                    }
                }
            }
        }

        public function passwordValidate($data1, $data2) {
            if(empty($data1) || trim($data1) == '') {
                $this->error['password'] = 'Das Feld "Passwort" ist auszufüllen.';
            } elseif(empty($data2)  || trim($data2) == '') {
                $this->error['repassword'] = 'Das Feld "Passwort wiederholen" ist auszufüllen.';
            } elseif(trim($data1) !== trim($data2)) {
                $this->error['repassword'] = "Ihre Passworteingaben stimmen nicht überein.";
            } else {
                $this->password = password_hash($data1, PASSWORD_DEFAULT);
            }
        }

        // we check first the usernames to not allow to have time of the same username
        protected function getUsernames() {
            $usersresult = $this->readUsers();
            return $usersresult;
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

            //the main function(s) of class - register user in DB
            if($check) {
                $this->registerUser($this->firstname, $this->lastname, $this->email, $this->username, $this->password);
                header ("location: $app_path/app/login_page.php?message=Registrierung erfolgreich. Sie können sich jetzt anmelden.&status=success");
            }
        }
    }