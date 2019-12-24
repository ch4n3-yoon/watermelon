<?php
class jwt
{
    protected $alg;
    function __construct()
    {
        $this->alg = 'sha256';
    }

    function hashing(array $data)
    {
        $header = json_encode(array(
            'alg'=> $this->alg,
            'typ'=> 'JWT'
        ));

        $payload = json_encode($data);
        $signature = hash($this->alg, $header.$payload);
        return base64_encode($header.'.'.$payload.'.'.$signature);
    }

    function dehashing($token)
    {
        $parted = explode('.', base64_decode($token));
        $signature = $parted[2];

        if(hash($this->alg, $parted[0].$parted[1]) != $signature)
            die("<script>alert('INVALID JWT!!');</script>");

        $payload = json_decode($parted[1],true);
        return $payload;
    }
}

$jwt = new jwt();
