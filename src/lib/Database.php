<?php

namespace Jose\MultiserviciosMelgar\lib;

use PDO;
use PDOException;

class Database {

    public function connect(): PDO {
        try {
            $connection = 'mysql:host=' . $_ENV['HOST'] . ';dbname=' . $_ENV['DB'] . ';charset=' . $_ENV['CHARSET'];
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $_ENV['USER'], $_ENV['PASSWORD'], $options);
            return $pdo;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}