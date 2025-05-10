<?php

namespace Jose\MultiserviciosMelgar\models;

use Jose\MultiserviciosMelgar\lib\Database;
use Jose\MultiserviciosMelgar\lib\Model;
use PDO;
use PDOException;

class Provider extends Model {
    private int $id;

    public function __construct(
        private string $name,
        private string $contact,) {
        parent::__construct();
        $this->id = -1;
    }

    public function save() {
        try {
            $query = $this->prepare("INSERT INTO provider (prov_name, prov_contact) VALUES (:name, :contact)");
            $query->execute([
                'name' => $this->name,
                'contact' => $this->contact,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function exists($name) {
        try {
            $db = new Database();
            $query = $db->connect()->prepare(
                "SELECT prov_name FROM provider WHERE prov_name = :name"
            );
            $query->execute(['name' => $name]);
            
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function get($name): Provider|null {
        try {
            $db = new Database();
            $query = $db->connect()->prepare(
                "SELECT * FROM provider WHERE prov_name=:name"
            );
            $query->execute(['name' => $name]);
            
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $user = new Provider(
                $data['prov_name'],
                $data['prov_contact'],
                
            );
            $user->setId($data['prov_id']);

            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return NULL;
        }
    }

    public static function getById(string $provider_id): Provider|null {
        try {
            $db = new Database();
            $query = $db->connect()->prepare("SELECT * FROM provider WHERE prov_id = :provider_id");
            $query->execute(['user_id' => $provider_id]);

            $data = $query->fetch(PDO::FETCH_ASSOC);

            $user = new Provider(
                $data['prov_name'],
                $data['prov_contact'],
            );
            $user->setId($data['prov_id']);

            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return NULL;
        }
    }

    public static function deleteById($provider_id): bool {
        try {
            $db = new Database();
            $query = $db->connect()->prepare("DELETE FROM provider WHERE prov_id = :prov_id");
            $query->execute(['prov_id' => $provider_id]);

            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }

    }

    // Getters y Setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getContact(): string {
        return $this->contact;
    }

    public function setContact(string $contact): void {
        $this->contact = $contact;
    }
}