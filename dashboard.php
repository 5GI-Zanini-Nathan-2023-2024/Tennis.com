<!DOCTYPE html>

<html>

    <head>
        <title>Area riservata</title>
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

        <article id = "dashboardArticle">

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
                progressBarDescription.innerHTML = "La tua area personale è in fase di caricamento...";

                progressBarContainerDiv.appendChild(progressBarDiv);
                document.body.appendChild(progressBarContainerDiv);
                document.body.appendChild(progressBarDescription);

                var progressBarAnimationSetInterval = setInterval(progressBarAnimation, 1500);

            </script>

            <?php

                include "connection.php";
                session_start();

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $statement = $connection->prepare("SELECT Nome, Cognome, Email, Telefono, Città, Via, Nascita FROM Utenti WHERE Email = ?");
                    $statement->bind_param("s", $_SESSION["session_user_email"]);
                    $statement->execute();
                    $statement->store_result();
                    $statement->bind_result($userName, $userSurname, $userEmail, $userTelephone, $userCity, $userStreet, $userBirthDate);
                    $statement->fetch();
                    $statement->close();
                }

                else {
                    header('Location: login.php');
                }
                
            ?>

            <h1 style = "font-size: 60px; padding-top: 15px; color: #ffffff">Benvenuto nella tua area riservata, <?php echo $userName ?>!</h1>

            <h2 style = "font-size: 40px; padding-top: 20px; color: #00ff00">I tuoi dati personali:</h2>

            <?php

                $html_out = '<div id = "personalInformationContainer">';

                $html_out .= '<p><b>Nome:</b> ' . $userName . '</p><br><br>';
                $html_out .= '<p><b>Cognome:</b> ' . $userSurname . '</p><br><br>';
                $html_out .= '<p><b>Email:</b> ' . $userEmail . '</p><br><br>';
                $html_out .= '<p><b>Numero di telefono:</b> ' . $userTelephone . '</p><br><br>';
                $html_out .= '<p><b>Città:</b> ' . $userCity . '</p><br><br>';
                $html_out .= '<p><b>Via di residenza:</b> ' . $userStreet . '</p><br><br>';
                $html_out .= '<p><b>Data di nascita:</b> ' . $userBirthDate . '</p><br><br>';

                $html_out .= '</div>';

                echo $html_out;

            ?>

            <h2 style = "font-size: 40px; padding-top: 20px; color: #00ff00">I tuoi prodotti salvati:</h2>

            <?php

                $query = "SELECT * FROM Salvataggi WHERE EmailUtente = ?";
                $queryResult = $connection->execute_query($query, [$userEmail]);

                if (mysqli_num_rows($queryResult) > 0) {

                    $html_out = '<div class = "articlesContainer">';
                    $rowArticleNumber = 0;
                    $productCodes = array();

                    while ($row = mysqli_fetch_array($queryResult)) {

                        $rowArticleNumber++;

                        $productCode = htmlspecialchars($row["CodiceProdotto"]);
                        $statement = $connection->prepare("SELECT Nome, Marca, Descrizione, Peso, Prezzo, Immagine FROM Prodotti WHERE Codice = ?");
                        $statement->bind_param("s", $productCode);
                        $statement->execute();
                        $statement->store_result();
                        $statement->bind_result($productName, $productBrand, $productDescription, $productWeight, $productPrice, $productImage);
                        $statement->fetch();

                        $html_out .= '<div class = "shopArticle">';
                        $html_out .= '<img src = "' . $productImage . '">';
                        $html_out .= '<p><b>Nome:</b> ' . $productName . '</p><br>';
                        $html_out .= '<p><b>Marca:</b> ' . $productBrand . '</p><br>'; 
                        $html_out .= '<p><b>Descrizione:</b> ' . $productDescription . '</p><br>'; 
                        $html_out .= '<p><b>Peso:</b> ' . $productWeight . 'g</p><br>';
                        $html_out .= '<p><b>Prezzo:</b> ' . $productPrice . '€</p><br>';
                        $html_out .= '<form method = "POST"><button class = "removeFromFavouritesButton">Rimuovi dai preferiti</button></form><br>';
                        $html_out .= '</div>';

                        if ($rowArticleNumber == 3) {
                            $html_out .= '<div class = "break"></div>';
                            $rowArticleNumber = 0;
                        }

                        $formattedProductCode = ltrim($productCode, "0");
                        array_push($productCodes, $formattedProductCode);
                    }

                    $html_out .= '</div>';

                    $html_out .= '<div id = "emptyFavouritesButtonContainer">';
                    $html_out .= '<form method = "POST">';
                    $html_out .= '<button id = "emptyFavouritesButton" name = "emptyFavouritesButton" onclick = "emptyFavourites()">Rimuovi tutti i preferiti</button>';
                    $html_out .= '</form>';
                    $html_out .= '</div>';
                    
                    if (isset($_POST["emptyFavouritesButton"])) {
                        $query = "DELETE FROM Salvataggi WHERE EmailUtente = ?";
                        $connection->execute_query($query, [$userEmail]);
                    }

                    echo $html_out;
                }

                else {
                    $html_out = '<div style = "height: 200px"><p style = "font-size: 25px; padding-top: 20px">Non hai nessun preferito salvato.</p></div>';
                    echo $html_out;
                }
                
            ?>

            <script>
                assignIds("removeFromFavouritesButton", <?php echo json_encode($productCodes) ?>);
            </script>

            <?php

                for ($i = 0; $i < mysqli_num_rows($queryResult); $i++) {

                    $currentButtonName = "removeFromFavouritesButton-" . $productCodes[$i];

                    if (isset($_POST[$currentButtonName])) {
                        $productNumber = intval(substr($currentButtonName, 27));
                        $deleteQuery = "DELETE FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";
                        $deleteQueryResult = $connection->execute_query($deleteQuery, [$userEmail, $productNumber]);
                    }
                }

            ?> 

            <div id = "onlineShopLinkContainer">
                <h2 class = "linkHeading">Visita il negozio online!</h2>
                <a href = "tennisShop.php"><img src = "Icons/General/shop.ico"></a>
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