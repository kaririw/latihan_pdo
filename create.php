
<?php
require_once 'Catatan.php';

$catatan = new Catatan();

$catatan->setJudul("Catatan Pertama");
$catatan->setIsi("Ini adalah isi catatan pertama.");

$id = $catatan->save();

echo "Catatan berhasil disimpan dengan ID: " . $id;
