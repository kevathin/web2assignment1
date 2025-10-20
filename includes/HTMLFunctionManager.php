<?php 
    include "aboutFunctions.php";
    include "APIFunctions.php";
    include "companyFunctions.php";
    include "indexFunctions.php";
    include "generalFunctions.php";
?>

<?php
    
    // this will be the main function that generates all the pages
    function produceBody($pageTitle){

        produceHeader($pageTitle);

        

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
            if(isset($_POST['linkType'])){
                
            }else{
                produceAPIContent();
            }
            

        } elseif($pageTitle == "About"){

            produceAboutContent();

        } else{
            // do something here idk
        }
    }


?>

        