<?php

$dictionary_api = 'https://api.dictionaryapi.dev/api/v2/entries/en/' . $word;


// Reads the JSON file.
$json_data = file_get_contents($dictionary_api);


// Decodes the JSON data into a PHP array.
$response_data = json_decode($json_data);

// Gets the word definition array
$dictionary = $response_data[0];
