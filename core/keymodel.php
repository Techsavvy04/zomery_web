<?php
require(__DIR__ . '/db.php');

class KeyModel extends Database
{
    public function __construct()
    {
        parent::__construct(require('config/config.php'));
    }
}
