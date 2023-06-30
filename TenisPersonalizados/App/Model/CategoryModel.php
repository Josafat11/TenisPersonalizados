<?php
/**
 * Modelo para gestionar las categorías en la base de datos.
 */
class CategoryModel {
    /**
     * Conexión a la base de datos.
     * @var DBConnection
     */
    private $CategoryConnection;

    /**
     * Constructor de la clase CategoryModel.
     * Crea una instancia de la clase DBConnection para la conexión a la base de datos.
     */
    public function __construct() {
        require_once('app/config/DBConnection.php');
        $this->CategoryConnection = new DBConnection();
    }

    /**
     * Obtiene todas las categorías de la base de datos.
     * @return array Arreglo de categorías.
     */
    public function getAllCategories() {
        // Paso 1: Crear la consulta para obtener todas las categorías
        $sql = "SELECT * FROM categorias";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);
        $categories = array();

        // Paso 2: Obtener las categorías
        while ($category = $result->fetch_assoc()) {
            $categories[] = $category;
        }

        $this->CategoryConnection->closeConecction();
        return $categories;
    }

    /**
     * Obtiene una categoría por su ID.
     * @param int $categoryId ID de la categoría.
     * @return mixed La categoría si se encontró, false si no se encontró.
     */
    public function getCategoryById($categoryId) {
        // Paso 1: Crear la consulta para obtener una categoría por su ID
        $sql = "SELECT * FROM categorias WHERE ID = $categoryId";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);

        // Paso 2: Verificar si se encontró la categoría
        if ($result && $result->num_rows > 0) {
            $category = $result->fetch_assoc();
            $this->CategoryConnection->closeConecction();
            return $category;
        } else {
            $this->CategoryConnection->closeConecction();
            return false;
        }
    }

    /**
     * Crea una nueva categoría en la base de datos.
     * @param string $name Nombre de la categoría.
     * @return bool True si se creó correctamente, false si ocurrió un error.
     */
    public function createCategory($name) {
        // Paso 1: Crear la consulta INSERT para crear una nueva categoría
        $sql = "INSERT INTO categorias (nombre) VALUES ('$name')";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->CategoryConnection->closeConecction();
        return $success;
    }

    /**
     * Actualiza una categoría existente en la base de datos.
     * @param int $categoryId ID de la categoría a actualizar.
     * @param string $name Nombre de la categoría.
     * @return bool True si se actualizó correctamente, false si ocurrió un error.
     */
    public function updateCategory($categoryId, $name) {
        // Paso 1: Crear la consulta UPDATE para actualizar una categoría
        $sql = "UPDATE categorias SET nombre = '$name' WHERE ID = $categoryId";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->CategoryConnection->closeConecction();
        return $success;
    }

    /**
     * Elimina una categoría de la base de datos.
     * @param int $categoryId ID de la categoría a eliminar.
     * @return bool True si se eliminó correctamente, false si ocurrió un error.
     */
    public function deleteCategory($categoryId) {
        // Paso 1: Crear la consulta DELETE para eliminar una categoría
        $sql = "DELETE FROM categorias WHERE ID = $categoryId";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->CategoryConnection->closeConecction();
        return $success;
    }
}
?>
