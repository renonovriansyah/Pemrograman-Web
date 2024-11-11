<?php

require_once "Orang.php";

class OrangInggris extends Orang{
    public function ucapsalam(){
        echo "Hello My Name Is " . $this->nama . "<br>";
    }
}