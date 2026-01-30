<?php
include_once 'DataBase.php';

class Product {
    private $conn;
    private $table_name = 'products';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addProduct($name, $price, $description, $image) {
        $query = "INSERT INTO {$this->table_name} (name, price, description, image) VALUES (:name, :price, :description, :image)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            return true;
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }
    }

    public function getAllProducts() {
        $query = "SELECT id, name, price, description, image FROM {$this->table_name}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $query = "SELECT id, name, price, description, image FROM {$this->table_name} WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }
    }
}
?>
