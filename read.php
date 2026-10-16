
<?php
require_once 'Catatan.php';

$catatan = new Catatan();
$detail = $catatan->getById(1);

if ($detail) {
    echo "Judul: " . $detail['judul'] . PHP_EOL;
    echo "Isi: " . $detail['isi'] . PHP_EOL;
} else {
    echo "Catatan tidak ditemukan.";
}
?>
