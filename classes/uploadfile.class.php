<?php
    /**
     * this class gets the excel file and insets the data into the database
     */
    class UploadFile extends SetQuery {
        /**
         * all these properties are string
         *
         * @var string
         */
        private $username = '';
        public  $year = '';
        public  $month = '';
        public  $company = '';
        public  $type = '';
        public  $sendto = '';
        public  $detail = '';
        private $filename = '';
        private $fileExtension = '';
        public  $error = array('year'=>'', 'month'=>'', 'company'=>'', 'type'=>'', 'sendto'=>'', 'file'=>'');

        /**
         * sets the user property to register who uploaded this excel file
         *
         * @param string $user
         */
        function __construct($user) {
            $this->username = $user;
        }

        /**
         * validate if user chose the correct value for the year
         * if not sets the error in the error array 
         * @param string $data
         * @return void
         */
        public function yearValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['year'] = 'Das Feld "Jahr" ist auszufüllen.';
            } else {
                $this->year = htmlspecialchars(strtolower($data));
            }
        }
        
        /**
         * validate if user chose the correct value for the month
         * if not sets the error in the error array
         * @param string $data
         * @return void
         */
        public function monthValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['month'] = 'Das Feld "Monat" ist auszufüllen.';
            } else {
                $this->month = htmlspecialchars(strtolower($data));
            }
        }

        /**
         * validate if user chose the correct value for the company name
         * if not sets the error in the error array
         * @param string $data
         * @return void
         */
        public function companyValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['company'] = 'Das Feld "Firma" ist auszufüllen.';
            } else {
                $this->company = htmlspecialchars($data);
            }
        }

        /**
         * validate if user chose the correct value for the type of the delivery
         * if not sets the error in the error array
         * @param string $data
         * @return void
         */
        public function typeValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['type'] = 'Das Feld "Art" ist auszufüllen.';
            } else {
                $this->type = htmlspecialchars($data);
            }
        }

        /**
         * validate if user chose the correct value for the location of the delivery
         * if not sets the error in the error array
         * @param string $data
         * @return void
         */
        public function sendtoValidate($data) {
            if(empty($data) || trim($data) == '') {
                $this->error['sendto'] = 'Das Feld "Es Geht über" ist auszufüllen.';
            } else {
                $this->sendto = htmlspecialchars($data);
            }
        }

        /**
         * sets the detail property for the extra detail given by the user
         *
         * @param string $data
         * @return void
         */
        public function detailValidate($data) {
            $this->detail = htmlspecialchars($data);
        }
        
        /**
         * this method validate the file extension of the excel file
         *
         * @return void
         */
        public function extensionValidate() {
            $extension_array = ['xls', 'xlsx'];
            $file_extension = strtolower(pathinfo($_FILES['excelfile']['name'], PATHINFO_EXTENSION));
            if(in_array($file_extension, $extension_array)) {
                $this->fileExtension = $file_extension;
            } else {
                $this->error['file'] = "Die Dateierweiterung wird nicht unterstützt";
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
            //everything is ok:
            if($check) {
                //set a name for the uploaded file which is equal to the name of th e database of the data of this excel file:
                $this->filename = $this->company . "_" . $this->year  . "_" . $this->month . "_" . rand(1,100) . "." . $this->fileExtension;
                    
                //moving the file to the folder of the phpspreadsheet library:
                // $filepath = $_SERVER['DOCUMENT_ROOT'] . '/phpspreadsheet/vendor/phpoffice/phpspreadsheet/samples/Reader/sampleData/' . $this->filename;
                $filepath = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $this->filename;
                move_uploaded_file($_FILES['excelfile']['tmp_name'], $filepath);
                if(file_exists($filepath)) {
                    ////now we run the function from setQuery class to insert the file information into database(list of uploaded files which is actually the list of excel files as databases ): 
                    //first remove dot and space from filename:
                    $newFilename = str_replace (' ', '_', $this->filename);
                    $newFilename = str_replace ('.', '_', $newFilename);
                    $this->registerFile($this->username, $this->year, $this->month, $this->company, $this->type, $this->sendto, $this->detail, $newFilename);
                    //now we set the filename and file path and file extension as a session index for the library page to read the excel file and run a class function to insert the data into a new table in database with the name of this filename:
                    $_SESSION['libraryFilename'] = $this->filename;
                    $_SESSION['libraryFilepath'] = $filepath;
                    //--> because of the librarys setting the first letter should be capital:
                    $_SESSION['libraryFileExtension'] = ucfirst($this->fileExtension);
                    //to control the success at the end:
                    return true;
                } else {
                    header("Location: $app_path/app/error_page.php?message=Die Excel Datei wurde nicht hochgeladen, Bitte versuchen Sie noch einmal.");
                }
            }    
        }

        /**
         * a method to create a table with default structure in database
         *
         * @param array $array
         * @return void
         */
        public function saveExcel($array) {
            //////replacing the space and dot with underscore , because we use this session filename as table name in sql query for database:
            $tableName = $_SESSION['libraryFilename'];
            $tableName = str_replace (' ', '_', $tableName);
            $tableName = str_replace ('.', '_', $tableName);
            $createResult = $this->createTable($tableName);
            //define variables:
            $pzn  = $Bezeichnung  = $Menge  = $Einheit  = $adler_k  = $billroth_k  = $citygate_k  = $hoffnung_k  = $retz_k  = $wienerberg_k  = $phönix_k  = $kwizda_k  = $herba_k = $phönix_prozent  = $kwizda_prozent  = $herba_prozent  = '';
            if($createResult) {
                $excelData = $array;
                for($i=2; $i<= count($excelData); $i++) {
                    $pzn  = strval($excelData[$i]['A']);
                    $Bezeichnung  = strval($excelData[$i]['B']);
                    $Menge  = strval($excelData[$i]['C']);
                    $Einheit  = strval($excelData[$i]['D']);
                    // "K" means "kauf" and "V" means "verkauf"
                    $adler_k  = intval($excelData[$i]['E']);
                    $billroth_k  = intval($excelData[$i]['F']);
                    $citygate_k  = intval($excelData[$i]['G']);
                    $hoffnung_k  = intval($excelData[$i]['H']);
                    $retz_k  = intval($excelData[$i]['I']);
                    $wienerberg_k  = intval($excelData[$i]['J']);
                    $phönix_k  = intval($excelData[$i]['K']);
                    $kwizda_k  = intval($excelData[$i]['L']);
                    $herba_k  = intval($excelData[$i]['M']);
                    //$Summe  = intval($excelData[$i]['N']);
                    $phönix_prozent  = strval($excelData[$i]['N']);
                    $kwizda_prozent  = strval($excelData[$i]['O']);
                    $herba_prozent  = strval($excelData[$i]['P']);

                    $this->insertExcel($tableName, $pzn, $Bezeichnung, $Menge, $Einheit, $adler_k, $billroth_k, $citygate_k, $hoffnung_k, $retz_k, $wienerberg_k, $phönix_k, $kwizda_k, $herba_k, $phönix_prozent, $kwizda_prozent, $herba_prozent);
                }
                //inserting the last row as "Summe" just for the "Bezeichnung" field:
                $lastRow = $this->insertSummeRow($tableName);
                if($lastRow == true) {
                    return true;
                } else {
                    return false;
                }
            } else {
                header("Location: $app_path/app/error_page.php?message=Die Excel Datei wurde nicht gespeichert, Bitte versuchen Sie noch einmal.");
            }
        }
    }