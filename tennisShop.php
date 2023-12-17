<!DOCTYPE html>

<html>

    <head>
        <title>Negozio tennistico</title>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1'>
        <link rel = "icon" type = "image/x-icon" href = "/Icons/General/favicon.ico"> 
        <link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel = "stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href = 'style.css' rel = 'stylesheet'>
        <script src = "./javascript.js"></script>
    </head>

    <body>

        <article id = "tennisShopArticle">

            <h1 style = "font-size: 80px; padding-top: 15px; color: #ffffff">Acquista i migliori articoli sportivi!</h1>

            <script>
                
                document.body.setAttribute("style", "background-color: #000000");

                let progressBarContainerDiv = document.createElement("div");
                progressBarContainerDiv.setAttribute("id", "progressBarContainerDiv");
                progressBarContainerDiv.className = "progress";
                progressBarContainerDiv.setAttribute("style", "position: absolute; top: 43%; left: 15%; width: 70%; height: 8%");

                let progressBarDiv = document.createElement("div");
                progressBarDiv.setAttribute("id", "progressBar");
                let progressBarClasses = ["progress-bar", "progress-bar-striped", "bg-success", "progress-bar-animated"];

                for (let i = 0; i < progressBarClasses.length; i++) {
                    progressBarDiv.classList.add(progressBarClasses[i]);
                }

                progressBarDiv.setAttribute("role", "progressbar");
                progressBarDiv.setAttribute("style", "width: 0%");
                progressBarDiv.setAttribute("aria-valuenow", "0");
                progressBarDiv.setAttribute("aria-valuemin", "0");
                progressBarDiv.setAttribute("aria-valuemax", "100");

                let progressBarDescription = document.createElement("p");
                progressBarDescription.setAttribute("id", "progressBarDescription");
                progressBarDescription.setAttribute("style", "position: absolute; top: 55%; font-size: 30px");
                progressBarDescription.innerHTML = "Lo shop online è in fase di caricamento...";

                progressBarContainerDiv.appendChild(progressBarDiv);
                document.body.appendChild(progressBarContainerDiv);
                document.body.appendChild(progressBarDescription);

                var progressBarAnimationSetInterval = setInterval(progressBarAnimation, 1500);

            </script>

            <?php

                include "connection.php";
                session_start();

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    
                    $userEmail = $_SESSION['session_user_email'];

                    $query = "SELECT * FROM Prodotti";
                    $queryResult = $connection->execute_query($query);

                    $html_out = '<div class = "articlesContainer">';
                    $rowArticleNumber = 0;
                    $articleNumber = 0;
                    $productCodes = array();

                    while ($row = mysqli_fetch_array($queryResult)) {

                        $articleNumber++;
                        $rowArticleNumber++;

                        $html_out .= '<div class = "shopArticle">';
                        $productCode = htmlspecialchars($row["Codice"]);
                        $html_out .= '<img src = "' . htmlspecialchars($row["Immagine"]) . '">';
                        $html_out .= '<p><b>Nome:</b> ' . htmlspecialchars($row["Nome"]) . '</p><br>';
                        $html_out .= '<p><b>Marca:</b> ' . htmlspecialchars($row["Marca"]) . '</p><br>'; 
                        $html_out .= '<p><b>Descrizione:</b> ' . htmlspecialchars($row["Descrizione"]) . '</p><br>'; 
                        $html_out .= '<p><b>Peso:</b> ' . htmlspecialchars($row["Peso"]) . 'g</p><br>';
                        $html_out .= '<p><b>Prezzo:</b> ' . htmlspecialchars($row["Prezzo"]) . '€</p><br>';
                        $html_out .= '<form method = "POST">';


                        $iconClassList = "fa fa-heart fa-5x";

                        $favouriteProductsQuery = "SELECT * FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";
                        $favouriteProductsQueryResult = $connection->execute_query($favouriteProductsQuery, [$userEmail, $productCode]);

                        if (mysqli_num_rows($favouriteProductsQueryResult) == 1) {
                            $iconClassList .= " favourite";
                        }

                        $html_out .= '<br><button class = "addToFavouritesButton"><i class = "' . $iconClassList . '" onclick = "addToFavourites(this)"></i></button>';
                        
                        
                        $html_out .= '</form>';
                        $html_out .= '</div>';

                        if ($rowArticleNumber == 3) {
                            $html_out .= '<div class = "break"></div>';
                            $rowArticleNumber = 0;
                        }

                        $formattedProductCode = ltrim($productCode, "0");
                        array_push($productCodes, $formattedProductCode);
                    }

                    $html_out .= '</div>';

                    echo $html_out;
                }

                else {
                    header('Location: login.php');
                }

            ?>

            <script>
                assignIds("addToFavouritesButton", <?php echo json_encode($productCodes) ?>);
            </script>

            <?php

                for ($i = 0; $i < mysqli_num_rows($queryResult); $i++) {

                    $currentButtonName = "addToFavouritesButton-" . $productCodes[$i];
                    $currentProductCode = substr($currentButtonName, 22);

                    $productSelectionQuery = "SELECT * FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";
                    $productSelectionQueryResult = $connection->execute_query($productSelectionQuery, [$userEmail, $currentProductCode]);

                    if (mysqli_num_rows($productSelectionQueryResult) == 0) {
                        $clickCounter = 0;
                    }
                    else if (mysqli_num_rows($productSelectionQueryResult) == 1) {
                        $clickCounter = 1;
                    }

                    if (isset($_POST[$currentButtonName])) {

                        if ($clickCounter % 2 == 0) {
                            $insertQuery = "INSERT INTO Salvataggi VALUES (?, ?)";
                            $connection->execute_query($insertQuery, [$userEmail, $currentProductCode]);
                        }

                        else if ($clickCounter % 2 != 0) {
                            $deleteQuery = "DELETE FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";
                            $connection->execute_query($deleteQuery, [$userEmail, $currentProductCode]);
                        }

                        $clickCounter++;
                    }
                }

            ?>

            <div id = "dashboardLinkContainer">
                <h2 class = "linkHeading">Controlla i prodotti che hai salvato nella tua area riservata!</h2>
                <br>
                <a href = "dashboard.php"><img id = "shoppingCartIcon" src = "Icons/General/shoppingCart.ico"></a>
            </div>

        </article>
        
        <footer>
            <p> Autore: Zanini Nathan</p>
            <br> <br>
            <p> Classe: 5GI </p>
            <br> <br>
            <p style = "display: inline">
                Email:
                <a href = "mailto:19636@studenti.marconiverona.edu.it"> 19636@studenti.marconiverona.edu.it</a>
            </p>
        </footer>
        
    </body>

</html>