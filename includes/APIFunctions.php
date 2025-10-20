<?php

    function produceAPIContent(){
        echo "<container class='mainBox oneAndTwoFRFrameBox'>";
            produceAPIRow("api/companies.php","returns all companies in json format");
            produceAPIRow("api/companies.php?ref=AMZN","returns all company information for AMZN in json format");
            produceAPIRow("api/portfolio.php?ref=8","returns a portfolio of a specific client with id 8 in json format");
            produceAPIRow("api/history.php?ref=AMZN","returns the history of a specific company AMZN in json format");
        echo "</container>";
    }

    function produceAPIRow($link, $description){
        echo "<div class='linkContainer'><p>";
            echo "<a href='".$link."'>".$link."</a>";
        echo "</p></div>";
        echo "<div class='linkDescriptionContainer'>";
            echo "<p>".$description."</p>";
        echo "</div>";
    }

?>