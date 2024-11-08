<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    
    // Tentukan nama file CSV
    $file_path = 'data.csv';
    
    // Cek apakah file sudah ada atau belum
    $file_exists = file_exists($file_path);
    
    // Buka file CSV untuk append
    $file = fopen($file_path, 'a');
    
    // Jika file belum ada, tambahkan header kolom
    if (!$file_exists) {
        fputcsv($file, ['NIM', 'Nama', 'Jenis Kelamin', 'Alamat', 'No HP', 'Email']);
    }
    
    // Tambahkan data ke file CSV
    fputcsv($file, [$nim, $nama, $jenis_kelamin, $alamat, $no_hp, $email]);
    
    // Tutup file
    fclose($file);
    
    // Redirect kembali ke form
    header('Location: form.html');
    exit();
}
?>
