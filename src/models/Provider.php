<?php

namespace Jose\ProyectoMelgar\models;

use Jose\ProyectoMelgar\lib\Database;
use Jose\ProyectoMelgar\lib\Model;
use PDO;
use PDOException;

class Provider extends Model {
    private int $id;
    private string $name;
    private string $contact;

    public function __construct() {
        parent::__construct();
        $this->id = -1;
    }

    public function getAll(): array {
        $providers = [];

        try {
            $query = $this->prepare("SELECT * FROM provider");
            $query->execute([]);

            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $provider = new Provider();
                $provider->setId($p['prov_id']);
                $provider->setName($p['prov_name']);
                $provider->setContact($p['prov_contact']);

                array_push($providers, $provider);
            }

            return $providers;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
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
            $user = new Provider();
            $user->setId($data['prov_id']);
            $user->setName($data['prov_name']);
            $user->setContact($data['prov_contact']);

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
            $query->execute(['provider_id' => $provider_id]);

            $data = $query->fetch(PDO::FETCH_ASSOC);

            $provider = new Provider();
            $provider->setId($data['prov_id']);
            $provider->setName($data['prov_name']);
            $provider->setContact($data['prov_contact']);

            return $provider;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return NULL;
        }
    }

    public static function update(Provider $provider): bool {
        try {
            $db = new Database();
            $query = $db->connect()->prepare(
                "UPDATE provider SET prov_name = :name, prov_contact = :contact WHERE prov_id = :id"
            );
            $query->execute([
                'name' => $provider->getName(),
                'contact' => $provider->getContact(),
                'id' => $provider->getId()
            ]);

            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
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