<?php

// Select endpoint: in this case '/poi-info'
$url = "https://met-api.ubimet.at:8090/v2/pinpoint-data?sets=rain_forecast_9d_1d&coordinates=25.00+-17.00";

// Insert your token here
$token = "0ae17c9399cd016022a68595adcb4322780d941f";

// First specify context:
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"Authorization: Token $token\r\n"
    )
);
$context = stream_context_create($opts);

// Read Response
$response = file_get_contents($url, false, $context);

// Remove any special characters
$json = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true );

//~ echo  var_dump($json);
echo json_encode($json[0]["met_sets"][0]["parameter_timesets"][0]["data"]);

?>
