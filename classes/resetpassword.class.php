<?php

    class ResetPassword extends SetQuery {
        
        public $tokenRecord = '';
        public $password = '';
        public $repassword = '';
        public $error = array('password'=>'', 'repassword'=>'');
        
        //check and compare the token from the link inside the email with the token inserted into DB as we sent the email to user
        public function checkValues($email, $token) {

            //read the token (selector and expire date) of DB
            $this->tokenRecord = $this->readTokenAll($email);
            
            if ($token == $this->tokenRecord['selector']) {
                $checkToken == true;
            } else {
                $checkToken == false;
            }
            
            $currentDate = date("U");
            
            if($checkToken == true) {
                if($this->tokenRecord['expire'] > $currentDate) {
                    $_SESSION['resetPasswordEmail'] = $email;
                    header("Location: $app_path/app/resetpassword_page.php");
                } else {
                    $message = 'Die Daten sind abgelaufen, bitte versuchen Sie noch einmal.';
                    header("Location: $app_path/app/error_page.php?message=$message");
                }
            } else {
                $message = 'Die Daten sind falsch, bitte versuchen Sie noch einmal.';
                header("Location: $app_path/app/error_page.php?message=$message");
            }
        }
        
        //validate inputs:
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
        
        // check the  errors, if there is none, then the main function(s) of class:
        public function checkError($resetPassEmail) {
            $check = true;
            $error = $this->error;
            foreach($error as $key=>$value) {
                if($value !== '') {
                    echo '<h1 class="error"><i class="fas fa-exclamation-triangle"></i> Bitte überprüfen Sie Ihre Eingaben!</h1>';
                    $check = false;
                    break;
                }
            }

            //the main function(s) of class - update users password
            if($check) {
                $changepass = $this->updateUserpassword($resetPassEmail, $this->password);
                if($changepass == true) {
                    header ("location: $app_path/app/login_page.php?message=Registrierung erfolgreich. Sie können sich jetzt anmelden.&status=success");
                } else {
                    $message = 'Das Passwort wurde nicht aktuallisiert, bitte versuchen Sie noch einmal.';
                    header("Location: $app_path/app/error_page.php?message=$message");
                }
            }
        }
    }