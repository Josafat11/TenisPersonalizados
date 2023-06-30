<?php
class ProductModel {
    private $ProductConnection;

    public function __construct() {
        require_once('app/config/DBConnection.php');
        $this->ProductConnection = new DBConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM productos";
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $products = array();
        while ($product = $result->fetch_assoc()) {
            $products[] = $product;
        }
        $this->ProductConnection->closeConecction();
        return $products;
    }

    public function getById($id) {
        $sql = "SELECT * FROM productos WHERE ID = $id";
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $product = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : false;
        $this->ProductConnection->closeConecction();
        return $product;
    }

    public function insertProduct($name, $price) {
        $sql = "INSERT INTO productos (nombre, precio) VALUES ('$name', '$price')";
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->ProductConnection->closeConecction();
        return $success;
    }

    public function updateProduct($id, $name, $price) {
        $sql = "UPDATE productos SET nombre = '$name', precio = '$price' WHERE ID = $id";
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->ProductConnection->closeConecction();
        return $success;
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM productos WHERE ID = $id";
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->ProductConnection->closeConecction();
        return $success;
    }
}
?>
