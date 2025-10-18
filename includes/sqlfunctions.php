<?php
    function checkDB(){
        //if the DB is not setup it will create and fill the databases
        
            $pdo = new PDO("../data/example.db");

            $createUsersTable = "CREATE TABLE users(
                userID INTEGER PRIMARY KEY,
                firstName TEXT,
                lastName TEXT
            );";
            // DECIMAL (total digits, # of decimal points)
            // history low and high value are within the past 5 years
            $createStocksTable = "CREATE TABLE stocks(
                stockID TEXT PRIMARY KEY,
                stockName TEXT,
                webLink TEXT,
                financialWebLink TEXT,
                stockDescription TEXT,
                totalVol INTEGER,
                averageVol INTEGER,
                historyLowVal DECIMAL(10, 2),
                historyHighVal DECIMAL(10, 2),
                currentVal DECIMAL(10, 2)
            );";

            // portfolioID = userID-stockID
            $createPortfolioTable = "CREATE TABLE portfolios(
                portfolioID TEXT PRIMARY KEY,
                userID INTEGER,
                stockID TEXT,
                amount INTEGER,
                FOREIGN KEY (userID) REFERENCES users(userID),
                FOREIGN KEY (stockID) REFERENCES stocks(stockID)
            );";

            //stockHistoryID = stockID-stockDate
            //stockDate = yyyy-mm-dd
            $createHistoryTable = "CREATE TABLE history(
                stockHistoryID INTEGER PRIMARY KEY,
                stockID TEXT,
                stockDATE TEXT, 
                stockOpenVal DECIMAL(10, 2),
                stockCloseVal DECIMAL(10, 2),
                FOREIGN KEY (stockID) REFERENCES stocks(stockID)
            );";

            //users (specify order of attributes)
            //Values (instance value of attribute)
            //values (instance 1*), (instance 2*)... etc
            $insertValuesOfUsers = "INSERT INTO users 
                (userID, firstName, lastName) 
                Values 
                (001, Kevin, Bertasius),  
                (002, Kevin, Bacon),
                (003, John, Doe),
                (004, Jane, Doe),
                (005, Will, Smith),
                (006, Steve, Harvey),
                (007, Morgan, Freeman),
                (008, Ryan, Reynolds),
                (009, Ryan, Gosling),
                (010, Jim, Carrey)
            ;";

            $insertValuesOfStocks = "INSERT INTO stocks 
                (stockID, stockName, webLink, financialWebLink, stockDescription, totalVol, averageVol, historyLowVal, historyHighVal, currentVal) 
                Values 
                    (
                        'es=f', 
                        'S&P 500', 
                        'https://finance.yahoo.com/quote/ES=F/',
                        'N/A',
                        2695690000,
                        2010000,
                        3120.71,
                        6800.00,
                        6718.95
                    ),
                    (
                        'GOOG',
                        'Alphabet Inc.',
                        'https://finance.yahoo.com/quote/GOOG/',
                        'https://finance.yahoo.com/quote/GOOG/financials/',
                        12100000000,
                        19830000,
                        75.73,
                        257.58,
                        253.79
                    ),
                    (
                        'AMZN',
                        'Amazon.com Inc.',
                        'https://finance.yahoo.com/quote/AMZN/',
                        'https://finance.yahoo.com/quote/AMZN/financials/',
                        10660000000,
                        48800000,
                        81.69,
                        241.77,
                        213.04
                    )
            ;";

            $insertValuesOfHistory = "INSERT INTO history 
            (stockHistoryID, stockID, stockDate, stockOpenVal, stockCloseVal) 
            Values 
            ('es=f-2025-10-17','es=f','2025-10-17', 6659.25, 6718.95 ),
            ('GOOG-2025-10-17','GOOG','2025-10-17', 251.35, 253.79),
            ('AMZN-2025-10-17','AMZN','2025-10-17', 214.56, 213.04)
            ;";

            $insertValuesOfPortfolio = "INSERT INTO portfolios 
            (portfolioID, userID, stockID, amount) 
            Values 
                ('001-es=f', 001, 'es=f', 1),
                ('001-GOOG', 001, 'GOOG', 1),
                ('001-AMZN', 001, 'AMZN', 1),

                ('002-es=f', 002, 'es=f', 2),

                ('003-GOOG', 003, 'GOOG', 3),
                ('003-AMZN', 003, 'AMZN', 3),

                ('004-GOOG', 004, 'GOOG', 4),

                ('005-es=f', 005, 'es=f', 5),
                ('005-GOOG', 005, 'GOOG', 5),
                ('005-AMZN', 005, 'AMZN', 5),

                ('006-GOOG', 006, 'GOOG', 6),
                ('006-es=f', 006, 'es=f', 6),

                ('007-AMZN', 007, 'AMZN', 7),
                ('007-es=f', 007, 'es=f', 7),

                ('008-AMZN', 008, 'AMZN', 8),

                ('009-es=f', 009, 'es=f', 9),
                ('009-AMZN', 009, 'AMZN', 9),
                ('009-GOOG', 009, 'GOOG', 9),

                ('010-GOOG', 010, 'GOOG', 10),
                ('010-AMZN', 010, 'AMZN', 10)
            ;";

        
    }

    function requestItem($queryString){
        
    }

?>