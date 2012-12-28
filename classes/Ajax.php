<?php
/**
 * Created by JetBrains PhpStorm.
 * User: g
 * Date: 28/12/12
 * Time: 12:03
 * To change this template use File | Settings | File Templates.
 */
require_once ("Database.php");
require_once ("MockDatabaseFactory.php");
class Ajax
{
    private $database;

    function __construct()
    {
        if (isset($_GET['test'])) {
            $this->database = MockDatabaseFactory::getInstance();
        } else {
            $this->database = new Database();
        }
    }

    private function outputJSON($str)
    {
        header('Content-Type: application/json');
        echo json_encode($str);
    }

    public function getDenominations($telco)
    {
        $denoms = $this->database->getDenominations($telco);
        $this->outputJSON($denoms);
    }


    public function getTelcos()
    {
        $this->outputJSON($this->database->getTelcos());
    }

}
