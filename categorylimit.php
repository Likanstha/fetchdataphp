<?php

$category = NULL;
$limit = NULL;

//both argument taken
if(isset($argc)){
    for($i=1; $i<$argc; $i++){
        if($i === 1){
            $category = $argv[1];
        }
        if($i === 2){
            $limit = $argv[2];
        }
    }
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//from URL way fetching data
// $url = "https://api.publicapis.org/entries";

//making api call
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_HEADER, false);
// $data = curl_exec($curl);
// curl_close($curl);

//fetch data from file
$data = file_get_contents('entries.json');
$response  = json_decode($data);
$entries = $response->entries;



$category_data_array = [];
$count=0;

if($category !== NULL && $limit !== NULL){
    foreach($entries as $key => $value){

        if(strtolower($value->Category) === strtolower($category)){
            $category_data_array[] = $value;
            $count++;
        }
        if($count === (int)$limit){
            break;
        }
    }
}


if(count($category_data_array) === 0){
    echo "No Results";
    exit();
}

echo "<pre>";
print_r($category_data_array);
echo "</pre>";
exit();