<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = file_get_contents('entries.json');
$response  = json_decode($data);
$entries = $response->entries;

//dummy data assume
$category = 'animals';
$limit = 2;
$count = 0;

$category_data_array = [];

if($category !== NULL && $limit !== NULL){
    foreach($entries as $value){

        if(strtolower($value->Category) === strtolower($category)){
            $category_data_array[] = $value;
            $count++;
        }
        if($count === (int)$limit){
            break;
        }
    }
}


echo "<pre>";
print_r($category_data_array);
echo "</pre>";
exit();



