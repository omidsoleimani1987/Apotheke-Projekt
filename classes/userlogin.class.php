<?php
    /**
     * this class has methods to let the users to login into website
     * gets the users infos and validate them and then verify them according to db
     */
    class UserLogin extends SetQuery {
        /**
         * these properties are all strings values and they are users information
         * @var string
         */
        public $username = '';
        public $password = '';
        public $error = array('username'=>'', 'password'=>'');

        /**
         * this method gets the user username and validate it and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data
         * @return void
         */
        public function usernameValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['username'] = "Das Feld Vorname ist auszufüllen.";
            } else {
                $this->username = htmlspecialchars($data);
            }
        }

        /**
         * this method gets the password that is entered by user and compare it to password from user and sets the related property to it
         * by letting this field empty or give an incorrect value, it will set an index of error array to the related field
         * @param string $data
         * @return void
         */
        public function passwordValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['password'] = 'Das Feld "Passwort" ist auszufüllen.';
            } else {
                $this->password = htmlspecialchars($data);
            }
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
             * read the users info for login and set the all session variables which we need later
             */
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
        
        /**
         * gets the usernames from db
         *
         * @return array of usernames which are already inserted into db
         */
        public function checkLogin() {
            $result = $this->userLogin();
            return $result;
        }

    }