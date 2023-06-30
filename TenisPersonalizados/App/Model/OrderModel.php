<?php
/**
 * Modelo para gestionar los pedidos en la base de datos.
 */
class OrderModel {
    /**
     * Conexión a la base de datos.
     * @var DBConnection
     */
    private $OrderConnection;

    /**
     * Constructor de la clase OrderModel.
     * Crea una instancia de la clase DBConnection para la conexión a la base de datos.
     */
    public function __construct() {
        require_once('app/config/DBConnection.php');
        $this->OrderConnection = new DBConnection();
    }

    /**
     * Obtiene todos los pedidos de la base de datos.
     * @return array Arreglo de pedidos.
     */
    public function getAllOrders() {
        // Paso 1: Crear la consulta para obtener todos los pedidos
        $sql = "SELECT * FROM pedidos";
        $connection = $this->OrderConnection->getConnection();
        $result = $connection->query($sql);
        $orders = array();

        // Paso 2: Obtener los pedidos
        while ($order = $result->fetch_assoc()) {
            $orders[] = $order;
        }

        $this->OrderConnection->closeConecction();
        return $orders;
    }

    /**
     * Obtiene un pedido por su ID.
     * @param int $orderId ID del pedido.
     * @return mixed El pedido si se encontró, false si no se encontró.
     */
    public function getOrderById($orderId) {
        // Paso 1: Crear la consulta para obtener un pedido por su ID
        $sql = "SELECT * FROM pedidos WHERE ID = $orderId";
        $connection = $this->OrderConnection->getConnection();
        $result = $connection->query($sql);

        // Paso 2: Verificar si se encontró el pedido
        if ($result && $result->num_rows > 0) {
            $order = $result->fetch_assoc();
            $this->OrderConnection->closeConecction();
            return $order;
        } else {
            $this->OrderConnection->closeConecction();
            return false;
        }
    }

    /**
     * Crea un nuevo pedido en la base de datos.
     * @param int $customerId ID del cliente asociado al pedido.
     * @param string $orderDate Fecha del pedido.
     * @return bool True si se creó correctamente, false si ocurrió un error.
     */
    public function createOrder($customerId, $orderDate) {
        // Paso 1: Crear la consulta INSERT para crear un nuevo pedido
        $sql = "INSERT INTO pedidos (id_cliente, fecha_pedido) VALUES ($customerId, '$orderDate')";
        $connection = $this->OrderConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->OrderConnection->closeConecction();
        return $success;
    }

    /**
     * Actualiza un pedido existente en la base de datos.
     * @param int $orderId ID del pedido a actualizar.
     * @param int $customerId ID del cliente asociado al pedido.
     * @param string $orderDate Fecha del pedido.
     * @return bool True si se actualizó correctamente, false si ocurrió un error.
     */
    public function updateOrder($orderId, $customerId, $orderDate) {
        // Paso 1: Crear la consulta UPDATE para actualizar un pedido
        $sql = "UPDATE pedidos SET id_cliente = $customerId, fecha_pedido = '$orderDate' WHERE ID = $orderId";
        $connection = $this->OrderConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->OrderConnection->closeConecction();
        return $success;
    }

    /**
     * Elimina un pedido de la base de datos.
     * @param int $orderId ID del pedido a eliminar.
     * @return bool True si se eliminó correctamente, false si ocurrió un error.
     */
    public function deleteOrder($orderId) {
        // Paso 1: Crear la consulta DELETE para eliminar un pedido
        $sql = "DELETE FROM pedidos WHERE ID = $orderId";
        $connection = $this->OrderConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->OrderConnection->closeConecction();
        return $success;
    }
}
?>
