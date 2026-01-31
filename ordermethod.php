<?php
include_once 'DataBase.php';
include_once 'user.php';
include_once 'productMethod.php';

$database = new Database();
$db = $database->getConnection();
$orderObj = new Order($db);



class Order {
    private $conn;
    private $table_name = 'orders';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addOrder($user_id, $product_id, $street_name, $city_state) {
        $query = "INSERT INTO {$this->table_name} (user_id, product_id, street_name, city_state) VALUES (:user_id, :product_id, :street_name, :city_state)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':street_name', $street_name);
        $stmt->bindParam(':city_state', $city_state);

        if ($stmt->execute()) {
            return true;
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }
    }

    public function getAllOrders() {
        $query = "SELECT o.id, o.user_id, o.product_id, o.street_name, o.city_state, u.name, u.surname, p.name as product_name FROM orders o JOIN useri u ON o.user_id = u.id JOIN products p ON o.product_id = p.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deleteOrder($id) {
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
