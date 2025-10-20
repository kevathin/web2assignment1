<?php
    include_once "sqlfunctions.php";
?>

<?php

    function produceCompanyContent($companyID){
        $companyInfo = requestCompanyInfo($companyID);
        echo "<container class='mainBox twoAndOneFRFrameBox'>";

            echo "<div class='twoWideGrid' id='companyInfo'>";
                produceCompanyInformation($companyInfo);
            echo "</div>";

            echo "<div id='history'>";
                produceCompanyHistory($companyInfo);
            echo "</div>";

            echo "<div id='majorCompanyPoints'>";
                produceCompanyPoints($companyInfo);
            echo "</div>";

        echo "</container>";
    }

    function produceCompanyInformation($companyInfo){
        echo "<div id='generalCompanyInfo'>";
        echo "</div>";
        echo "<div id='companyFinancialInfo'>";
        echo "</div>";
    }

    function produceCompanyHistory($companyInfo){

    }

    function produceCompanyPoints($companyInfo){
        
    }

?>