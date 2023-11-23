<?php
class Crud {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'crud';
    private $connect;

    public function __construct() {
        $this->connect = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }
    }

    public function insert(string $table, array $data) {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->executeQuery($sql);
    }

    public function select(string $table, string $condition = '') {
        $sql = "SELECT * FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }
        return $this->executeQuery($sql);
    }

    public function update(string $table, array $data, string $condition) {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ', ');
        $sql = "UPDATE $table SET $set WHERE $condition";
        return $this->executeQuery($sql);
    }

    public function delete(string $table, string $condition) {
        $sql = "DELETE FROM $table WHERE $condition";
        return $this->executeQuery($sql);
    }

    private function executeQuery(string $sql) {
        $result = $this->connect->query($sql);
        if (!$result) {
            die("Query failed: " . $this->connect->error);
        }
        return $result;
    }

    public function __destruct() {
        $this->connect->close();
    }
}
