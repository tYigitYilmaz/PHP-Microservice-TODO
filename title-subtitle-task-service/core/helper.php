<?php

use Core\Model\Response;

function vd($var){
    echo "<pre>";
    var_dump($var);
}

function dd($var){
    echo "<pre>";
    var_dump($var);
    die;
}

$start_time =  microtime(true);


function logTime($message){
    global $start_time;
    $end_time = microtime(true);
    echo "<br>";
    echo ": =>".($end_time -$start_time)."<="."<br>". $message;
    $start_time = $end_time;
}


function getDirName($path,$quantity){

    for ($i=0; $i<$quantity; $i++){
        $path =  dirname($path);
    }

    return $path;
}

function curl($url_invoke, $method, $payload){
    $ch = curl_init($url_invoke);

    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
    );
    $result = curl_exec($ch);
    $result = json_decode($result);

    curl_close($ch);
    $response = new Response($result->success, $result->messages, $result->data, $result->statusCode);
    $response->send();
}

$memoize = function($func)
{
    return function() use ($func)
    {
        static $cache = [];

        $args = func_get_args();
        $key = serialize($args);

        if ( !isset($cache[$key])) {
            $cache[$key] = call_user_func_array($func, $args);
        }

        return $cache[$key];
    };
};

?>