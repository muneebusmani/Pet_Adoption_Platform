<?php
namespace models;
use PDO;
class conn{
    public $conn;
    function init(){return new PDO(
        'sqlsrv:Server=localhost;Database=Pet Adoption Platform;',
        'sa',
        'muneeb123',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            "Encrypt" => 1,
            "TrustServerCertificate" => 0
        ));
}
}
