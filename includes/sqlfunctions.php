<?php
    global $isDBexist = false;
    function checkDB(){
        if(isDBsetup() == false){
            $pdo = new PDO("../data/example.db");
            $sql = "";
        }
    }

    function isDBsetup(){
        try{
            $pdo = new PDO("../data/example.db");
            $sql = "Select * from users;";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $row = $statement->fetchAll();
            $pdo = null;
        }catch(){
            return false;
        }
        return true;
    }

    function requestItem($queryString){
        if($isDBexist == false){
            checkDB();
        }
    }

?>