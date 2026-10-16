
<?php
require_once 'DatabaseConnection.php';

class Catatan {
    private $connection;
    private $judul;
    private $isi;

    public function __construct() {
        $db = DatabaseConnection::getInstance();
        $this->connection = $db->getConnection();
    }

    public function setJudul($judul) {
        $this->judul = $judul;
        return $this;
    }

    public function setIsi($isi) {
        $this->isi = $isi;
        return $this;
    }

    public function save() {
        $sql = "INSERT INTO catatan (judul, isi) VALUES (:judul, :isi)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':judul' => $this->judul,
            ':isi' => $this->isi
        ]);
        return $this->connection->lastInsertId();
    }

    public static function getAll() {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = "SELECT * FROM catatan";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    public static function getById($id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = "SELECT * FROM catatan WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function update($id) {
        $sql = "UPDATE catatan SET judul = :judul, isi = :isi WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            ':judul' => $this->judul,
            ':isi' => $this->isi,
            ':id' => $id
        ]);
    }

    public static function delete($id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = "DELETE FROM catatan WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
