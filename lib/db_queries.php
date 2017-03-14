<?php
include 'db_connect.php';

function select_records(
    $table_name,
    $field_name = false,
    $params = false,
    $first_record_force = false)
{
    $records = [];
    global $connect;
    $query_string = "SELECT * FROM $table_name";
    if($field_name && $params) {
        $query_string .= " WHERE $field_name = $params";
    }
    $query = mysqli_query($connect, $query_string);
    if($first_record_force) {
        $records = mysqli_fetch_object($query);
    }else{
        while ($result = mysqli_fetch_object($query)){
            $records[] = $result;
        }
    }
    return  $records;
}

function delete_records($table_name, $field, $params){
    global $connect;
    if (empty($params)) return false;
    $query_string = "DELETE FROM $table_name WHERE $field = $params";
    return mysqli_query($connect, $query_string);
}

function create_record($table_name, $params){
    global $connect;
    if (empty($params)) return false;
    $query_string = "INSERT INTO $table_name";
    $fields ='(' . implode(', ', array_keys($params)) .')';
    $values = ' VALUES ' .  '(' . implode(', ', array_map(
        function ($value)use ($connect){
            return "'". mysqli_real_escape_string($connect, $value)."'";
        }, $params)) .')';
    $query_string .= $fields . $values;
    return mysqli_query($connect, $query_string);
}


function update_record($table_name, $params, $field_name){
    global $connect;
    $force_id = null;
    if(!empty($params) && !empty($field_name) && array_key_exists($field_name, $params)){
        $force_id = $params[$field_name];
        unset($params[$field_name]);
        $query_string = "UPDATE $table_name SET ";;
        array_walk($params, function(&$value, $key) use ($connect, $query_string){
            $value = "$key = '" . mysqli_real_escape_string($connect, $value) . "'";
        });
        $query_string.= implode($params, ', ');
        if(!empty($force_id)){
            $field_value = mysqli_real_escape_string($connect, $force_id);
            $query_string .=  " WHERE $field_name = $field_value";
        }
        return mysqli_query($connect, $query_string);
    }else return false;
}
