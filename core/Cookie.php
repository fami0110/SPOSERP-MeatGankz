<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Cookie
{
    private static $SECRET_KEY = "ZHxTsCPhncHnBWhsRUatdumctOidOum9";

    public static function create_jwt($payload, $exp)
    {
        $jwt = JWT::encode($payload, self::$SECRET_KEY, 'HS256');
        setcookie("PERPUSTAKAAN-SESSION", $jwt, $exp, "/");
    }

    public static function delete_jwt()
    {
        setcookie("PERPUSTAKAAN-SESSION", "", time() - 3600, "/");
    }

    public static function get_jwt()
    {
        if (isset($_COOKIE['PERPUSTAKAAN-SESSION'])) {
            $jwt = $_COOKIE['PERPUSTAKAAN-SESSION'];
            try {
                $payload = JWT::decode($jwt, new Key(self::$SECRET_KEY, 'HS256'));
                return $payload;
            } catch (Exception $e) {
                return null;
            }
        } else {
            return null;
        }
    }
}
