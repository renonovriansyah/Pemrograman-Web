<?php
session_start();

// Mengecek apakah sesi 'count' sudah ada
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1; // Jika belum ada, mulai dengan 1
} else {
    $_SESSION['count'] = $_SESSION['count'] + 1; // Menambah count
}

// Menghapus session 'count' jika tombol di klik
if (isset($_GET['delete_session'])) {
    unset($_SESSION['count']); // Menghapus sesi 'count'
    session_destroy(); // Menghancurkan seluruh session (opsional)
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh halaman setelah menghapus sesi
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Implementasi Session</title>
</head>
<body>
    <h1>Implementasi Session</h1>
    
    <p>Anda Telah Mengunjungi Halaman Ini <?php echo $_SESSION['count']; ?> Kali</p>
    
    <!-- Tautan untuk menghapus session -->
    <a href="?delete_session=true">Hapus Session</a>

</body>
</html>
