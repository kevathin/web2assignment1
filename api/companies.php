<?php

    function isCorrectQueryStringInfo($param) { 
        if ( isset($_GET[$param]) && !empty($_GET[$param]) ) { 
            return true; 
        } else { 
            return false; 
        } 
    }

    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");

    $pdo = new PDO("sqlite:../data/stocks.db");
    $returnList = [];
    
    if(isCorrectQueryStringInfo('ref')){
        $sql = "SELECT * FROM companies WHERE symbol = ?;";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_GET['ref']);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $attribute=>$value){
            $returnList[$attribute] = $value;
        }

    } else{
        $sql = "SELECT * FROM companies;";
        $result = $pdo->query($sql);
        foreach($result as $row){
            $tempList = [];
            foreach($row as $attribute=>$value){
                $tempList[$attribute] = $value;
            }
            $returnList[] = $tempList;
        }
    }
    
    echo json_encode($returnList);
    $pdo = null;
?>