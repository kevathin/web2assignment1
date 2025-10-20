<?php
    include_once "sqlfunctions.php";
?>


<?php

    function produceEmptyIndexContent(){
        echo "<container class='mainBox oneAndTwoFRFrameBox'>";
            produceClientList();
            echo "<div id='portfolioBox'>";
                echo "<div id='portfolioSummary'>";
                    echo "<h3> Portfolio </h3>";
                    echo "<p>Please select a client portfolio</p>";
                echo "</div>";
            echo "</div>";
        echo "</container>";
    }   

    function produceUserIndexContent($userID){
        echo "<container class='mainBox oneAndTwoFRFrameBox'>";
            produceClientList();
            echo "<div id='portfolioBox'>";
                producePortfolioSection($userID);
            echo "</div>";
        echo "</container>";
    }

    function producePortfolioSection($userID){

        $clientName = requestClientName($userID);
        $portfolioDetails = requestClientPortfolio($userID);
        $numOfCompanies = count($portfolioDetails);
        $numOfShares = 0;
        $totalValue = 0;
        foreach($portfolioDetails as $symbol=>$values){
            $totalValue = $totalValue + ($values['amount'] * $values['valuePerStock']);
            $numOfShares = $numOfShares + $values['amount'];
        }

        echo "<div id='portfolioSummary'>";
            echo "<h3>" . $clientName['fname'] . " " . $clientName['lname'] . " Portfolio Summary</h3>";
            echo "<div id='portfolioSummaryInfoBox'>";

                echo "<div class='summaryBox'>";
                    echo "<h4>Companies</h4>";
                    echo "<p>".$numOfCompanies."</p>";
                echo "</div>";

                echo "<div class='summaryBox'>";
                    echo "<h4># shares</h4>";
                    echo "<p>".$numOfShares."</p>";
                echo "</div>";

                echo "<div class='summaryBox'>";
                    echo "<h4>Total Value</h4>";
                    echo "<p>$".number_format($totalValue,2)."</p>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div id='portfolioDetails'>";
            producePortfolioDetails($portfolioDetails);
        echo "</div>";

    }

    function producePortfolioDetails($portfolioInfo){
        echo "<h3>Portfolio Details</h3>";
        echo "<div id='portfolioDetailsBox'>";

        echo "<p class='portfolioAttributeHeader'>Symbol</p>";
        echo "<p class='portfolioAttributeHeader'>Name</p>";
        echo "<p class='portfolioAttributeHeader'>Sector</p>";
        echo "<p class='portfolioAttributeHeader'>Amount</p>";
        echo "<p class='portfolioAttributeHeader'>Value</p>";
        echo "<p class='portfolioAttributeHeader'>Company Info</p>";

        foreach($portfolioInfo as $symbol=>$values){
            $totalValue = $values['amount'] * $values['valuePerStock'];
            echo "<p> <a href='".$values['weblink']."'>". $symbol ."</a></p>";
            echo "<p> <a href='".$values['weblink']."'>". $values['cname'] ."</a></p>";
            echo "<p>". $values['sector'] ."</p>";
            echo "<p>". $values['amount'] ."</p>";
            echo "<p>$". number_format($totalValue,2) ."</p>";
            echo "<form method='POST' action='company.php' class='companyFormBox'>";
                echo "<button type='submit' class='companyInfoButton' name='companyID' value='".$symbol."'>Company Information</button>";
            echo "</form>";
        }

        echo "</div>";
    }

    // a function that echos the entire client section. the div format is as follows:
    //div with id clientSection contains:
    //  an h2 element with value clients
    //  a div clientList that contains:
    //      multiple div clientBox contains:
    //          a div that contains first and last name
    //          a form that contains the button for that clients portfolio
    function produceClientList(){
        echo "<div id='clientSection'>";

            echo "<h2> Clients </h2>";

            echo "<div id='clientList'>";

                $clientList = requestClientList();

                foreach($clientList as $id=>$values){
                    echo "<div class='clientBox'>";

                        echo "<div>";

                            echo "<p>". $values['fname'] ." " . $values['lname'] ." </p>";

                        echo "</div>";

                        echo "<form method='POST' action='index.php' class='clientForm'>";

                            echo "<button type='submit' class='clientPortfolioButton' name='userID' value='". $id ."' >Portfolio</button>";

                        echo "</form>";

                    echo "</div>";
                }

            echo "</div>";

        echo "</div>";
    }

?>