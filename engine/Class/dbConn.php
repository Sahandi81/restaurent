<?php


namespace DataBase;

use Exception;
use PDO;

class dbConn
{


    private string $host = '127.0.0.1';
    private string $DataBase = 'resturant';
    private string $dbUser = 'root';
    private string $dbPassword = '';
    protected object $dbConn;

    protected function stmt(): ?bool
    {
        try {
            $dbConn = new PDO("mysql:host=$this->host;dbname=$this->DataBase", $this->dbUser, $this->dbPassword);
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbConn = $dbConn;
            return true;
        } catch
        (Exception $e) {
            print "Connection failed" . $e->getMessage();
            die();
        }
    }

}