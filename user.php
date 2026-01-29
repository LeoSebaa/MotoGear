<?php



class user {
    private $conn;
    private $table_name = 'useri';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $surname, $email, $phone, $password) {
        $query = "INSERT INTO {$this->table_name} (name, surname, email, phone, password) VALUES (:name, :surname, :email, :phone, :password)";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return true;
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }
    }

    public function login($email, $password) {
        $query = "SELECT id, name, surname, email, phone, password FROM {$this->table_name} WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if a record exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                // Start the session and store user data
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                return true;
            }
        }
        return false;
    }
}
?>