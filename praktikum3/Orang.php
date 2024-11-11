<?php

class Orang{
    // property
    protected $nama;


    //method
    public function ucapsalam(){
        echo "<h2>Hallo, Perkenalkan Nama Saya " . $this->nama . "</h2>";
    }
}