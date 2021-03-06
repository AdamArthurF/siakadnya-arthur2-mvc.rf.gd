<?php
namespace Core\App;

abstract class Model {
    protected Database $db;
    protected string $tableName;

    /**
     * Model constructor.
     */
    public function __construct(){
        $this->db = new Database();
        if (isset($_SERVER['REDIRECT_URL'])):
            $this->tableName = strtolower(explode('/', $_SERVER['REDIRECT_URL'])[2]);
        endif;
    }

    /**
     * @return array
     */
    public function all(): array {
        $query = "SELECT * FROM {$this->tableName}";
        $this->db->prepare($query);
        $this->db->execute();
        return $this->db->fetchAll();
    }

    /**
     * @param $id
     * @return array
     */
    public function single($id): array {
        $query = "SELECT * FROM {$this->tableName} WHERE id = :id";
        $this->db->prepare($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->fetch();
    }

    /**
     * @return int
     */
    abstract public function add(): int;

    /**
     * @return int
     */
    abstract public function save(): int;

    /**
     * @param $id
     * @return int
     */
    public function remove($id): int {
        $query = "DELETE FROM {$this->tableName} WHERE id = :id";
        $this->db->prepare($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}