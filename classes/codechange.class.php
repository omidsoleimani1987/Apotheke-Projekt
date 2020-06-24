<?php
    /**
     * this class changes the entrance code of the website and replace the old one with the new given code from user into the db
     */
    class CodeChange extends SetQuery {
        
        /**
         * alls these properties are string type
         *
         * @var string
         */
        public $code = '';
        public $recode = '';
        public $error = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'username'=>'', 'code'=>'', 'recode'=>'');

        /**
         * this method gets the new code from user and validate it to be a correct and sets the related properties to it
         *
         * @param string $data1
         * @param string $data2
         * @return void
         */
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

        /**
         * this method checks the error array if there is none then it runs the main function of the method
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
             * this function inserts the new code into the db (replace the old one with the new one)
             */
            if($check) {
                $this->insertNewCode($this->code);
                header("Location: $app_path/app/home_page.php?message=Der Code wurde erfolgreich gewechselt.&status=success");
            }
        }
    }