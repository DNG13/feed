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
    $query_string = "DELETE FROM $table_name WHERE $field=$params";
    return mysqli_query($connect, $query_string);
}

function create_record($table_name, $field1, $field2, $value1, $value2){
    global $connect;
    $query_string = "INSERT INTO $table_name ($field1, $field2) VALUES ('$value1', '$value2')";
    return mysqli_query($connect, $query_string);
}

function update_record(
    $table_name,
    $params,
    $field1,
    $value1,
    $field2=false,
    $value2=false)
{
    global $connect;
    $query_string = "UPDATE $table_name SET $field1='$value1' ";
    if($field2 && $value2) {
        $query_string .= ", $field2='$value2'";
    }
    $query_string .= " WHERE id=$params";
    var_dump( $query_string);
    return mysqli_query($connect, $query_string);
}
