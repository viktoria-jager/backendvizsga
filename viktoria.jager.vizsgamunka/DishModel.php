<?php

class DishModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "etterem");

        if ($this->conn->connect_error) {
            die("Adatbázis kapcsolat sikertelen: " . $this->conn->connect_error);
        }
    }

    public function list()
    {
        $sql = 'SELECT * FROM dishes';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOneById($id)
    {
        $sql = 'SELECT * FROM dishes WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function create(array $args)
    {
        $sql = 'INSERT INTO dishes (name, description, price, isActive, dishTypeId) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiii", ...$args);
        $stmt->execute();
        return true;
    }

    public function update(array $args)
    {
        $sql = 'UPDATE dishes SET name = ?, description = ?, price = ?, isActive = ?, dishTypeId = ? WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiiii", ...$args);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM dishes WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}