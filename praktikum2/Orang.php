<?php

class Orang{
    // property
    public $nama;
    public $tgllahir;
    public $alamat;

    //constructor
    public function __construct()
    {
        $this->nama ="Anonymous";
    }

    //method
    public function ucapsalam(){
        echo "<h2>Hallo, Perkenalkan Nama Saya " . $this->nama . "</h2>";
    }

    //destructor
    public function __destruct()
    {
        echo "Ini Adalah Destructor Dari " . $this->nama . "<br>";
    }
}