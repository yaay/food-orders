<?php

include './db_connection.php';
include './connection_credentials.php';

$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);


function select() {
    global $db;

    try {
        $select_query = "select * from `restaurant`.`users`;";
        $select_stmt = $db->prepare($select_query);
        $res = $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $rows = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


function insert($name, $email, $password, $room_no, $ext, $profile_picture) {
    global $db;

    try {
        $insert_query = "insert into `restaurant`.`users` (`name`, `email`, `password`, `room_no`, `ext`, `profile_picture`) values (:uname, :uemail, :upass, :uromm, :uext, :upic);";
        $insert_stmt = $db->prepare($insert_query);
        $insert_stmt->bindParam(":uname", $name);
        $insert_stmt->bindParam(":uemail", $email);
        $insert_stmt->bindParam(":upass", $password);
        $insert_stmt->bindParam(":uromm", $room_no);
        $insert_stmt->bindParam(":uext", $ext);
        $insert_stmt->bindParam(":upic", $profile_picture);
        $res = $insert_stmt->execute();

        if($res) {
            $no_of_affected_rows = $insert_stmt->rowCount();
            $id = $db->lastInsertID();
            return $id;
        }
        return false;

    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function update($id, $name, $email, $password, $room_no, $ext, $profile_picture) {
    global $db;

    try {
        $update_query = "update `restaurant`.`users` set `name`=:uname, `email`=:uemail, `password`=:upass, `room_no`=:uroom, `ext`=:uext, `profile_picture`=:upic where `id`=:uid;";
        $update_stmt = $db->prepare($update_query);
        $update_stmt->bindParam(":uname", $name);
        $update_stmt->bindParam(":uemail", $email);
        $update_stmt->bindParam(":upass", $password);
        $update_stmt->bindParam(":uroom", $room_no);
        $update_stmt->bindParam(":uext", $ext);
        $update_stmt->bindParam(":upic", $profile_picture);
        $update_stmt->bindParam(":uid", $id);
        $res = $update_stmt->execute();

        if($res) {
            $no_of_affected_rows = $update_stmt->rowCount();
            return $no_of_affected_rows;
        }
        return false;

    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function delete($id) {
    global $db;
    try {
        $delete_query = "delete from `restaurant`.`users` where `id`=:id;";
        $delete_stmt = $db->prepare($delete_query);
        $delete_stmt->bindParam(":id", $id);
        $res = $delete_stmt->execute();

        if($res) {
            $no_of_affected_rows = $delete_stmt->rowCount();
            return $no_of_affected_rows;
        }
        return false;

    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}


function select_user_by_id($id) {
    global $db;

    try {
        $select_query = "select * from `restaurant`.`users` where id=:id;";
        $select_stmt = $db->prepare($select_query);
        $select_stmt->bindParam(":id", $id);
        $res = $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $user = $select_stmt->fetch(PDO::FETCH_ASSOC);
        return $user;

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}