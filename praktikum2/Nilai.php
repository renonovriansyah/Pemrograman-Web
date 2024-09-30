<?php
//Nilai.php

class Nilai{
    private $tugas = 0;
    private $uts = 0;
    private $uas = 0;

    //setter
    public function settugas($tugas){
        if($tugas <= 100 && $tugas >= 0){
            $this->tugas = $tugas;
        }else{
            $this->tugas = 0;
        }
    }

    public function setuts($uts){
        if($uts <= 100 && $uts >= 0){
            $this->uts = $uts;
        }else{
            $this->uts = 0;
        }
    }

    public function setuas($uas){
        if($uas <= 100 && $uas >= 0){
            $this->uas = $uas;
        }else{
            $this->uas = 0;
        }
    }

    //getter
    public function gettugas(){
        return $this->tugas;
    }

    public function getuts(){
        return $this->uts;
    }

    public function getuas(){
        return $this->uas;
    }

    //method
    public function hitungtotal(){
        $nilaitotal = 0.30 * $this->tugas + 0.35 * $this->uts + 0.35 * $this->uas;
        return $nilaitotal;
    }
}