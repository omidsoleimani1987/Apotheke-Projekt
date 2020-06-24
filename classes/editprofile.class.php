<?php
    /**
     * this class update the infos of existing users in database
     */
    class EditProfile extends SetQuery {
        
        /**
         * these properties are all strings values and they are users information
         * @var string
         */
        public $username = '';
        public $firstname = '';
        public $lastname = '';
        public $email = '';
        public $password = '';
        public $repassword = '';
        public $error = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'repassword'=>'');

        /**
         * this method reads first the users infos from db according the username and then sets the class properties to the default values
         *
         * @param string $data username 
         */
        function __construct($data) {
            $this->username = $data;
            $userCurrent = $this->readUserInfo($data);
            $this->firstname = $userCurrent['firstname'];
            $this->lastname = $userCurrent['lastname'];
            $this->email = $userCurrent['email'];
            $this->password = $userCurrent['password'];
        }

        /**
         * first validate the given data like first name and email and etc...then if they are valid data then sets the related class properties to them
         *
         * @param array $data of the users inputs as an array
         * @return void
         */
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
             * inserts the new users info throw a function into database, when successful then leads the user to the home page of the website
             */
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
