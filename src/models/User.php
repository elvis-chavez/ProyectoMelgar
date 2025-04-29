<?php

namespace Jose\MultiserviciosMelgar\models;

use Jose\MultiserviciosMelgar\lib\Database;
use Jose\MultiserviciosMelgar\lib\Model;

use PDO;
use PDOException;

class User extends Model {
    private int $id;
    private int $role_id;
    private int $active;

    public function __construct(
        private string $username,
        private string $lastname,
        private string $password,
        private string $email,
        private string $phone,
        private $birthdate) {
        // Constructor
        parent::__construct();
        $this->id = -1;
        $this->role_id = 1; // Rol por defecto
        $this->active = 1; // Activo por defecto
    }

    public function save() {
        try {
            $hash = $this->getHashedPassword($this->password);
            $query = $this->prepare(
                "INSERT INTO users (u_name, u_lastname, u_password, u_email, u_phone_number, u_birthdate, u_role_id, u_active) 
                VALUES (:username, :lastname, :pass, :email, :phone, :birthdate, 1, 1)"
                );
            $query->execute([
                'username' => $this->username,
                'lastname' => $this->lastname,
                'pass' => $hash,
                'email' => $this->email,
                'phone' => $this->phone,
                'birthdate' => $this->birthdate,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    private function getHashedPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    }

    public static function exists($username) {
        try {
            $db = new Database();
            $query = $db->connect()->prepare(
                "SELECT u_name FROM users WHERE u_name = :username"
            );
            $query->execute(['username' => $username]);
            
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

    public static function get($username): User|null {
        try {
            $db = new Database();
            $query = $db->connect()->prepare(
                "SELECT * FROM users WHERE u_name=:username"
            );
            $query->execute(['username' => $username]);
            
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $user = new User(
                $data['u_name'],
                $data['u_lastname'],
                $data['u_password'],
                $data['u_email'],
                $data['u_phone_number'],
                $data['u_birthdate'],
                
            );
            $user->setId($data['u_id']);
            $user->setRoleId($data['u_role_id']);
            $user->setActive($data['u_active']);

            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return NULL;
        }
    }

    public function comparePassword($password): bool {
        return password_verify($password, $this->password);
    }

    // Getters y Setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    public function getBirthdate(): string {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): void {
        $this->birthdate = $birthdate;
    }

    public function getRoleId(): int {
        return $this->role_id;
    }

    public function setRoleId(int $role_id): void {
        $this->role_id = $role_id;
    }

    public function getActive(): int {
        return $this->active;
    }

    public function setActive(int $active): void {
        $this->active = $active;
    }
}