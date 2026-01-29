<?php
include_once 'DataBase.php';

class comment {
    private $conn;
    private $table_name = 'comment';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addComment($name, $email, $message) {
        $query = "INSERT INTO {$this->table_name} (name, email, message) VALUES (:name, :email, :message)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            return true;
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }
    }

    public function getAllComments() {
        $query = "SELECT id, name, email, message, created_at FROM {$this->table_name} ORDER BY created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
