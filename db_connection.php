<?php

function connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port)
{
    try {


        $dsn = "mysql:db_name={$db_name};host={$db_host};port={$db_port}";

        $db = new PDO($dsn, $db_user, $db_password);

        if ($db) {
            return $db;
        }

        return false;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
