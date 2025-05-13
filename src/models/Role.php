<?php

namespace Jose\ProyectoMelgar\models;

use Jose\ProyectoMelgar\lib\Database;
use Jose\ProyectoMelgar\lib\Model;
use PDO;
use PDOException;

class Role extends Model {
    private int $id;
    private string $type;

    public function __construct() {
        parent::__construct();
    }

    public static function getAll() {
        $roles = [];
        try {
            $db = new Database();
            $query = $db->connect()->prepare("SELECT * FROM roles");
            $query->execute();

            while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                $role = new Role();
                $role->setId($r['role_id']);
                $role->setType($r['role_type']);

                array_push($roles, $role);
            }

            return $roles;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public static function getById(string $role_id): Role|null {
        try {
            $db = new Database();
            $query = $db->connect()->prepare("SELECT * FROM roles WHERE role_id = :role_id");
            $query->execute(['role_id' => $role_id]);

            $data = $query->fetch(PDO::FETCH_ASSOC);

            $role = new Role();
            $role->setId($data['role_id']);
            $role->setType($data['role_type']);

            return $role;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return NULL;
        }
    }

    public function save() {
        try {
            $query = $this->prepare("INSERT INTO roles(role_type) VALUES (:type)");
            $query->execute([':type' => $this->getType()]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function update(Role $role) {
        try {
            $db = new Database();
            $query = $this->prepare("UPDATE roles SET role_type = :type WHERE role_id = :id");
            $query->execute(['id' => $this->getId(), 'type' => $this->getType()]);

            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }  

    // Gettters y Setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getType(): string {
        return $this->type;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }
}