<?php

class EntranceCode extends SetQuery {

    // send request to read the code from DB
    public function checkCode($userCode) {
         
        $currentCode = $this->getCode();
       
            if(password_verify($userCode, $currentCode)) {
                header("Location: $app_path/app/login_page.php");
            }  else {
                $answer = 'wrong';
                return $answer;
            }
        
    }
    
}