<?php

include_once 'DbConfig.php';


class Crud extends DbConfig {

    public function __construct(){

        parent::__construct();

    }

    public function getData($query){

        $result = $this->connection->query($query);



        if ($result == false) {

            return false;

        }



        $rows = array();



        while ($row = $result->fetch_assoc()) {

            $rows[] = $row;

        }



        return $rows;

    }

    public function getError(){

        return $this->connection->error;

    }

    public function execute($query){

        $result = $this->connection->query($query) or die($this->connection->error);



        if ($result == false) {
            
            //echo 'Error: cannot execute the command';

            return false;

        } else {



               return $result;



        }

    }

    public function escape_string($value)

    {

        return $this->connection->real_escape_string(trim(preg_replace('/\t+/', '',$value)));

    }

   public function generateTrackingNo($min=1000000000, $max=4000000000) {
        return rand($min, $max);
    }
}

?>