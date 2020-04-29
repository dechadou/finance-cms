<?php

namespace App\Security\JWT;

use Firebase\JWT\JWT;

/**
 * Created by PhpStorm.
 * User: juanpablo
 * Date: 2019-03-27
 * Time: 20:48
 */

class JWTService
{
    /**
     * @var JWT
     */
    private $key;

    /**
     * JWTService constructor.
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encode($id) {
        $payload = array(
            "sub" => $id,
            "iat" => time(),
            "exp" => time() + (7 * 24 * 60 * 60)
        );

        return JWT::encode($payload, $this->key, 'HS256');
    }

    public function decode($token) {
        return JWT::decode($token, $this->key, ['HS256']);
    }

}