<?php
    /**
     * this class has methods to sign up users into database
     * gets the users infos and validate them and then insert them into db
     */
    class UserSignup extends SetQuery {
        
        /**
         * these properties are all strings values and they are users information
         * @var string
         */
        public $firstname = '';
        public $lastname = '';
        public $email = '';
        public $username = '';
        public $password = '';
        public $repassword = '';
        public $error = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'username'=>'', 'password'=>'', 'repassword'=>'');

        /**
         * this method gets the user first name and validate it and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data
         * @return void
         */
        public function firstnameValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['firstname'] = "Das Feld Vorname ist auszufüllen.";
            } elseif(!preg_match("/^[a-zA-Z ]*$/", $data)) {
                $this->error['firstname'] = 'Im Feld "Vorname" werden nur Buchstaben akzeptiert.';
            } else {
                $this->firstname = htmlspecialchars($data);
            }
        }

        /**
         * this method gets the user last name and validate it and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data
         * @return void
         */
        public function lastnameValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['lastname'] = "Das Feld Nachname ist auszufüllen.";
            } elseif(!preg_match("/^[a-zA-Z ]*$/", $data)) {
                $this->error['lastname'] = 'Im Feld "Nachname" werden nur Buchstaben akzeptiert.';
            } else {
                $this->lastname = htmlspecialchars($data);
            }
        }

        /**
         * this method gets the user's email address and validate it and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data
         * @return void
         */
        public function emailValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['email'] = "Es muss eine E-Mail-Adresse angegeben werden.";
            } elseif(!filter_var(trim($data), FILTER_VALIDATE_EMAIL)) {
                $this->error['email'] = "Bitte geben Sie eine gültige E-Mail-Adresse an.";
            } else {
                $this->email = htmlspecialchars($data);
            }
        }

        /**
         * this method gets the username that is chose by user and validate it to not be repeated from other users and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data
         * @return void
         */
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

        /**
         * this method gets the password that is chose by user and compare it to repeated password from user and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data1
         * @param string $data2
         * @return void
         */
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

        /**
         * gets the usernames from db
         *
         * @return array of usernames which are already inserted into db
         */
        protected function getUsernames() {
            $usersresult = $this->readUsers();
            return $usersresult;
        }

        /**
         * checks first the error array, when there is an error or errors, it returns an html to the screen to shows to the user that inserted field are not correct or fix the issues
         *
         * @return void
         */
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

            /**
             * when there is no errors it inserts the users info into db and sends the user to login page
             */
            if($check) {
                $this->registerUser($this->firstname, $this->lastname, $this->email, $this->username, $this->password);
                header ("location: $app_path/app/login_page.php?message=Registrierung erfolgreich. Sie können sich jetzt anmelden.&status=success");
            }
        }
    }