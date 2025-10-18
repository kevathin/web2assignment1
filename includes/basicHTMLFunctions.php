<?php
    // this just generates the header for all the pages. only difference is the page name
    function produceHeader($pageName){
        echo "<header class'overviewHeader'>";
        echo "<div>";
        echo "<h1 class'overviewTitle'> Portfolio Project ". $pageName . "</h1>";
        echo "</div>";
        echo "<div>";
        echo "<p> buttons </p>"
        echo "</div>";
        echo "</header>";
    }

    // this will be the main function that generates all the pages
    function produceBody($bodyType, $pageTitle){
        echo "<container class='mainBox ".$bodyType . "'>";
        if ($pageTitle == "Home"){
            if(isset($_POST["userID"])){
                produceUserIndexContent($_POST["userID"]);
            } else{
                produceEmptyIndexContent();
            }
        } elseif($pageTitle == "Company"){
            if(isset($_POST["companyID"])){
                produceCompanyContent($_POST["companyID"]);
            } else{
                //do something here idk
            }
        } elseif($pageTitle == "API"){
            produceAPIContent();
        } elseif($pageTitle == "About"){
            produceAboutContent();
        } else{
            // do something here idk
        }
        echo "</container>";
    }

    function produceCompanyContent($companyID){

    }

    function produceAPIContent(){

    }

    function produceEmptyIndexContent(){

    }

    function produceUserIndexContent($userID){

    }

    function produceAboutContent(){

    }

?>

        