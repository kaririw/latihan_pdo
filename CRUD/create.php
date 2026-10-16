
<?php
require_once '../Catatan.php';

$c = new Catatan();

$hasil = $c->setJudul("Ketiga")
           ->setIsi("Saya sedang belajar CRUD menggunakan PHP")
           ->save();

echo $hasil ? "Berhasil disimpan" : "Gagal";
