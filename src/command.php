<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

include_once 'Robot.php';

$data=json_decode(file_get_contents("php://input"));

if(!empty($data->command))
{
    for($i = 0; $i < strlen($data->command); $i++)
    {
        if($data->command[$i] != "M"
           || $data->command[$i] != "L"
           || $data->command[$i] != "R")
        {
            robotControls($data->command[$i]);
        }
        else
        {
            echo "Invalid command !";
            break;
        }
    }

    http_response_code(200);
}
else
{
    http_response_code(400);
    
    echo "Not found :(";
}

?>
