<?php
/**
 * this class is used for the search_work page side menu to filter the previewed links
 * the pharmacies without any order (zero amount) will be filtered to not be displayed in menu
 */
class IconLists extends SetQuery {
    
    /**
     * reads all the records and returns only the not zero amounts in html dom (menu) 
     *
     * @param string $tableName
     * @return void
     */
    public function getIcons($tableName) {

        $iconsArray = $this->iconsInfo($tableName);

        // we want just the pharmacies with values not equal to zero:
        if(intval($iconsArray['adler_k']) != 0) {
            echo '<a class="a" href="../pdf/adler_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Adler Lieferschein</a>';
        }
        if(intval($iconsArray['billroth_k']) != 0) {
            echo '<a class="a" href="../pdf/billroth_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Billroth Lieferschein</a>';
        }
        if(intval($iconsArray['citygate_k']) != 0) {
            echo '<a class="a" href="../pdf/citygate_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Citygate Lieferschein</a>';
        }
        if(intval($iconsArray['hoffnung_k']) != 0) {
            echo '<a class="a" href="../pdf/hoffnung_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Hoffnung Lieferschein</a>';
        }
        if(intval($iconsArray['retz_k']) != 0) {
            echo '<a class="a" href="../pdf/retz_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Retz Lieferschein</a>';
        }
        if(intval($iconsArray['wienerberg_k']) != 0) {
            echo '<a class="a" href="../pdf/wienerberg_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Wienerberg Lieferschein</a>';
        }
        if(intval($iconsArray['phönix_k']) != 0) {
            echo '<a class="a" href="../pdf/phönix_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Phönix Lieferschein</a>';
        }
        if(intval($iconsArray['kwizda_k']) != 0) {
            echo '<a class="a" href="../pdf/kwizda_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Kwizda Lieferschein</a>';
        }
        if(intval($iconsArray['herba_k']) != 0) {
            echo '<a class="a" href="../pdf/herba_lieferschein.php" style="display:block; width:30%;"><i class="far fa-file-pdf"></i> Herba Lieferschein</a>';
        }
    }
}

