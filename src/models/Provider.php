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