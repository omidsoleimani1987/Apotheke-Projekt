<?php
/**
 * this class is the main operation of the application
 * here user inserts the new values for the titles and the table in database will be updated
 */
class Main extends SetQuery {

    /**
     * first we read all info of table from DB and 
     *
     * @param string $tableName
     * @param int $medId
     * @return void
     */
    public function readMed($tableName, $medId) {
        return $this->readAll($tableName, $medId);
    }

    /**
     * then with this method we compare the to users inputs, when there is differences then we update the table with new values of users inputs
     *
     * @param string $tableName
     * @param int $medId
     * @param array $postArray
     * @return void
     */
    public function postInfo($tableName, $medId, $postArray) {
        $InfoArray = $this->readAll($tableName, $medId);
        if($postArray['Datum'] != '') {
            if($postArray['Datum'] != $InfoArray['Datum']) {
                $name = 'Datum';
                $value = $postArray['Datum'];
                $this->insertPostInfo($tableName, $medId, $name, $value);
            }
        }
        if($postArray['Charge'] != '') {
            if($postArray['Charge'] != $InfoArray['Charge']) {
                $name = 'Charge';
                $value = $postArray['Charge'];
                $this->insertPostInfo($tableName, $medId, $name, $value);
            }
        }
        if($postArray['Ablauf'] != '') {
            if($postArray['Ablauf'] != $InfoArray['Ablauf']) {
                $name = 'Ablauf';
                $value = $postArray['Ablauf'];
                $this->insertPostInfo($tableName, $medId, $name, $value);
            }
        }
        if($postArray['Viel'] != '') {
            if($postArray['Viel'] != $InfoArray['Viel']) {
                $name = 'Viel';
                $value = $postArray['Viel'];
                $this->insertPostInfo($tableName, $medId, $name, $value);
            }
        }
        if($postArray['Kaput'] != '') {
            if($postArray['Kaput'] != $InfoArray['Kaput']) {
                $name = 'Kaput';
                $value = $postArray['Kaput'];
                $this->insertPostInfo($tableName, $medId, $name, $value);
            }
        }
        if($postArray['Andere'] != '') {
            if($postArray['Andere'] != $InfoArray['Andere']) {
                $name = 'Andere';
                $value = $postArray['Andere'];
                $this->insertPostInfo($tableName, $medId, $name, $value);
            }
        }
        if($postArray['adler_v'] != '') {
            $name = 'adler_v';
            $value = intval($InfoArray['adler_v']) + intval($postArray['adler_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['billroth_v'] != '') {
            $name = 'billroth_v';
            $value = intval($InfoArray['billroth_v']) + intval($postArray['billroth_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['citygate_v'] != '') {
            $name = 'citygate_v';
            $value = intval($InfoArray['citygate_v']) + intval($postArray['citygate_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['hoffnung_v'] != '') {
            $name = 'hoffnung_v';
            $value = intval($InfoArray['hoffnung_v']) + intval($postArray['hoffnung_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['retz_v'] != '') {
            $name = 'retz_v';
            $value = intval($InfoArray['retz_v']) + intval($postArray['retz_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['wienerberg_v'] != '') {
            $name = 'wienerberg_v';
            $value = intval($InfoArray['wienerberg_v']) + intval($postArray['wienerberg_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['phönix_v'] != '') {
            $name = 'phönix_v';
            $value = intval($InfoArray['phönix_v']) + intval($postArray['phönix_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['kwizda_v'] != '') {
            $name = 'kwizda_v';
            $value = intval($InfoArray['kwizda_v']) + intval($postArray['kwizda_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
        if($postArray['herba_v'] != '') {
            $name = 'herba_v';
            $value = intval($InfoArray['herba_v']) + intval($postArray['herba_v']);
            $this->insertPostInfo($tableName, $medId, $name, $value);
        }
    }

}

            
