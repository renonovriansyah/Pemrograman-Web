<?php

require_once "Buku.php";
require_once "Database/Database.php";

class ListBuku {

    public function getData() {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $sql = "SELECT * FROM buku";
        $query = $koneksi->query($sql);

        $daftar_buku = [];

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $judul = $row['Judul'] ?? 'Unknown Title';
                $pengarang = $row['Pengarang'] ?? 'Unknown Author';
                $penerbit = $row['Penerbit'] ?? 'Unknown Publisher';
                $tahun = $row['Tahun'] ?? 'Unknown Year';
                $id = $row['ID'] ?? 0;

                $buku = new Buku($judul, $pengarang, $penerbit, $tahun);
                $buku->setId($id);
                $daftar_buku[] = $buku;
            }
        }
        return $daftar_buku;
    }

    public function getKolomTabel() {
        return array('ID', 'Judul', 'Pengarang', 'Penerbit', 'Tahun', 'Ubah');
    }

    public function simpan($buku) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssss", $buku->getJudul(), $buku->getPengarang(), $buku->getPenerbit(), $buku->getTahun());

        if ($stmt->execute()) {
            return "Data berhasil disimpan!";
        } else {
            return "Gagal menyimpan data: " . $stmt->error;
        }
    }

    public function hapus($id) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        if (!empty($id) && is_numeric($id)) {
            $sql = "DELETE FROM buku WHERE id = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                return "Data berhasil dihapus!";
            } else {
                return "Gagal menghapus data: " . $stmt->error;
            }
        } else {
            return "ID tidak valid untuk menghapus buku.";
        }
    }

    public function update($buku) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $sql = "UPDATE buku SET judul = ?, pengarang = ?, penerbit = ?, tahun = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssssi", $buku->getJudul(), $buku->getPengarang(), $buku->getPenerbit(), $buku->getTahun(), $buku->getId());

        if ($stmt->execute()) {
            return "Data berhasil diperbarui!";
        } else {
            return "Gagal memperbarui data: " . $stmt->error;
        }
    }

    public function getBukuById($id) {
        $db = new Database();
        $koneksi = $db->getKoneksi();

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $sql = "SELECT * FROM buku WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            $judul = $data['judul'] ?? 'Unknown Title';
            $pengarang = $data['pengarang'] ?? 'Unknown Author';
            $penerbit = $data['penerbit'] ?? 'Unknown Publisher';
            $tahun = $data['tahun'] ?? 'Unknown Year';
            $id = $data['id'] ?? 0;

            $buku = new Buku($judul, $pengarang, $penerbit, $tahun);
            $buku->setId($id);

            return $buku;
        }

        return false; // Kembalikan false jika tidak ada data
    }
}
