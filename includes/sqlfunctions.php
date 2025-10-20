<?php
    // it feels weird but since include is like copying a pasting the files together, i don't need to use the ../ when using PDO

    // returns a list that is organized like this:
    // $returnList = [id=>[fname=>value,lname=>value], etc];
    function requestClientList(){
        $pdo = new PDO("sqlite:data/stocks.db");
        $sql = "SELECT firstname, lastname, id FROM users;";
        $result = $pdo->query($sql);
        $returnList = [];
        while($row = $result->fetch()){
            $tempList = [];
            $tempList["fname"] = $row["firstname"];
            $tempList["lname"] = $row["lastname"];
            $returnList[$row["id"]] = $tempList; 
        }
        $pdo = null;
        return $returnList;
    }

    // returns a list that is organized like this:
    // $returnList = [fname=>value, lname=>value];
    function requestClientName($userID){
        $pdo = new PDO("sqlite:data/stocks.db");
        $sql = "SELECT firstname, lastname FROM users WHERE id = ?;";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1,$userID);
        $statement->execute();
        $result = $statement->fetch();

        $returnList = [];
        $returnList['fname'] = $result['firstname'];
        $returnList['lname'] = $result['lastname'];

        $pdo = null;
        return $returnList;
    }

    // returns a list that is organized like this:
    // (the return size is 3d nested list)
    // $returnList = [name=>value,sector=>value, etc, history=>[date=>values, date=> values]];
    function requestCompanyInfo($symbol){
        $pdo = new PDO("sqlite:data/stocks.db");

        $returnList = [];

        $companySql = "SELECT * FROM companies WHERE symbol = '". $symbol. "';";

        $companyResult = $pdo->query($companySql);
        $company= $companyResult->fetch();

        $returnList['symbol'] = $company['symbol'];
        $returnList['name'] = $company['name'];
        $returnList['sector'] = $company['sector'];
        $returnList['subindustry'] = $company['subindustry'];
        $returnList['address'] = $company['address'];
        $returnList['exchange'] = $company['exchange'];
        $returnList['website'] = $company['website'];
        $returnList['description'] = $company['description'];
        $returnList['financials'] = $company['financials'];

        $historySql = "Select * FROM history WHERE symbol = '".$symbol."' ORDER BY date DESC;";
        $historyResult = $pdo->query($historySql);
        $history = $historyResult->fetchAll();

        //historyList contains lists of every date and info of the company
        $historyList = [];

        foreach($history as $row){
            //temp contains the information of a specific day
            $temp = [];
            $temp['volume'] = $row['volume'];
            $temp['open'] = $row['open'];
            $temp['close'] = $row['close'];
            $temp['high'] = $row['high'];
            $temp['low'] = $row['low'];
            $historyList[$row['date']] = $temp;
        }

        $returnList['history'] = $historyList;

        $pdo = null;
        return $returnList;
    }

    // returns a list that is organized like this:
    // $returnList = [symbol=>[companyName=>value, sector=>value, amount=>value, valuePerStock=>value, companyLink=>value], etc]
    function requestClientPortfolio($userID){
        $pdo = new PDO("sqlite:data/stocks.db");
        
        // instead of having one really complex sql search query i am going to have three simple search queries.
        $portfolioSql = "SELECT symbol, amount FROM portfolio WHERE userID = ?;";
        $statement = $pdo->prepare($portfolioSql);
        $statement->bindValue(1,$userID);
        $statement->execute();
        $portfolioResult = $statement->fetchAll();

        $returnList = [];

        foreach($portfolioResult as $row){

            // me getting the name of the company and the sector of which the company resides
            $companySql = "SELECT name, sector, website FROM companies WHERE symbol = '". $row['symbol']. "';";

            // me getting the most recent close value to determine the value of the stock
            $historySql = "SELECT close FROM history WHERE symbol = '".$row['symbol']."' ORDER BY date DESC LIMIT 1;";

            //both results should just be one row
            $companyResult = $pdo->query($companySql);
            $company= $companyResult->fetch();

            $historyResult = $pdo->query($historySql);
            $history = $historyResult->fetch();

            $templist = [];
            $tempList['cname'] = $company['name'];
            $tempList['sector'] = $company['sector'];
            $tempList['amount'] = $row['amount'];
            $tempList['valuePerStock'] = $history['close'];
            $tempList['website'] = $company['website'];

            $returnList[$row['symbol']] = $tempList;
            
        }

        $pdo = null;
        return $returnList;
    }

?>