<?php

    class CodeChange extends SetQuery {
        
        public $code = '';
        public $recode = '';
        public $error = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'username'=>'', 'code'=>'', 'recode'=>'');

        //validate inputs:
        public function codeValidate($data1, $data2) {
            if(empty($data1) || trim($data1) == '') {
                $this->error['code'] = 'Das Feld "Passwort" ist auszufüllen.';
            } elseif(empty($data2) || trim($data2) == '') {
                $this->error['recode'] = 'Das Feld "Passwort wiederholen" ist auszufüllen.';
            } elseif(trim($data1) !== trim($data2)) {
                $this->error['recode'] = "Ihre Passworteingaben stimmen nicht überein.";
            } else {
                $this->code = password_hash($data1, PASSWORD_DEFAULT);
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
            //the main function(s) of class - insert new code into DB
            if($check) {
                $this->insertNewCode($this->code);
                header("Location: $app_path/app/home_page.php?message=Der Code wurde erfolgreich gewechselt.&status=success");
            }
        }
    }