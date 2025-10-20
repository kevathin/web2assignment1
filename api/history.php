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

    if(isCorrectQueryStringInfo('ref')){
        $returnList = [];
        $pdo = new PDO("sqlite:../data/stocks.db");
        $sql = "SELECT * FROM history WHERE symbol = ? ORDER BY date DESC;";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1,$_GET['ref']);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            $tempList = [];
            foreach($row as $attribute=>$value){
                $tempList[$attribute] = $value;
            }
            $returnList[] = $tempList;
        }

        echo json_encode($returnList);
        $pdo = null;
    } else{

    }

?>