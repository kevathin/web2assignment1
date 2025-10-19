<?php 
    include "aboutFunctions.php";
    include "APIFunctions.php";
    include "companyFunctions.php";
    include "indexFunctions.php";
    include "generalFunctions.php";
?>

<?php
    
    // this will be the main function that generates all the pages
    function produceBody($bodyType, $pageTitle){
        produceHeader($pageTitle);

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

        