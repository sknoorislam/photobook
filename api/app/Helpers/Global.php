<?php
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

function createJWTtoken($array)
{
    return JWT::encode($array, env('JWT_Token_Key'), 'HS256');
}

function decodeJWTtoken($token)
{
    return JWT::decode($token, new Key(env('JWT_Token_Key'), 'HS256'));
}

// encryption and decryption
function enDecryption($string, $action = 'e')
{
    // you may change these values to your own
    $secret_key = '1311874k';
    // you may change these values to your own
    $secret_iv  = '1965874k';
   
    $output         = false;
    $encrypt_method = "AES-256-CBC";
    $key            = hash('sha256', $secret_key);
    $iv             = substr(hash('sha256', $secret_iv), 0, 16);
    
    if ($action == 'e') {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } else if ($action == 'd') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


?>