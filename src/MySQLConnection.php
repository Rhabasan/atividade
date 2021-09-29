<?php
    namespace atividade;

    class MySQLConnection extends \PDO {
            public function __construct() {
                parent::__construct('mysql:host=localhost;dbname=biblioteca', 'root', '');
            }
    }
?>