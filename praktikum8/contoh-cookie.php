<?php
$value = "Ini Cookie Pertama";

// Mengecek apakah cookie sudah ada
if (!isset($_COOKIE['first_cookie'])) {
    // Jika cookie belum ada, set cookie baru
    setcookie("first_cookie", $value, time() + 3600 * 24 * 30); // Cookie berlaku selama 30 hari
}

// Menghapus cookie jika parameter 'delete_cookie' diterima
if (isset($_GET['delete_cookie'])) {
    setcookie('first_cookie', '', time() - 3600); // Menghapus cookie dengan waktu kedaluwarsa satu jam yang lalu
    // Menyegarkan halaman untuk memperbarui status cookie
    header("Location: " . $_SERVER['PHP_SELF'] . "?cookie_deleted=true"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Implementasi Cookie</title>
</head>
<body>
    <h1>Implementasi Cookie</h1>

    <!-- Menampilkan status cookie -->
    <?php if (isset($_COOKIE['first_cookie'])): ?>
        <p><?php echo $_COOKIE['first_cookie']; ?></p>
        <!-- Link untuk menghapus cookie -->
        <a href="?delete_cookie=true">Hapus Cookie</a>
    <?php elseif (isset($_GET['cookie_deleted'])): ?>
        <!-- Jika cookie sudah dihapus, tampilkan pesan ini -->
        <p>Cookie telah dihapus.</p>
    <?php else: ?>
        <!-- Jika cookie belum ada dan belum dihapus, tampilkan ini -->
        <p>Cookie Belum Di-Set</p>
    <?php endif; ?>

</body>
</html>
