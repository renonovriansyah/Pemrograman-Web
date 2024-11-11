<?php

require_once "Buku.php";
require_once "Database/Database.php";
class ListBuku{
    
public function getData(){
    $db = new Database();
    $koneksi = $db->getKoneksi();

    $sql = "SELECT * FROM buku";

    $query = $koneksi->query($sql);

    $list_buku = [];

    if ($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $buku = new Buku($row['Judul'], $row['Pengarang'], $row['Penerbit'], $row['Tahun']);
            $buku->setId($row['ID']);
            array_push($list_buku, $buku);
        }
    }
    return $list_buku;
    }

    public function getKolomTabel(){
        return array('ID', 'Judul', 'Pengarang', 'Penerbit', 'Tahun', 'Ubah');
    }

    public function simpan($buku){
        $db = new Database();
        $koneksi = $db->getKoneksi();

        $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun) 
        VALUES('".$buku->getJudul()."', '".$buku->getPengarang()."', '".$buku->getPenerbit()."', '".$buku->getTahun()."')";


        $query = $koneksi->query($sql);

        return $query;
    }
}
