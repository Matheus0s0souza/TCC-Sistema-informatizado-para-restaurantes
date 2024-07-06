<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <script>
        function onPageLoad() {
            getIdFromUrl();
            fetchData();
        }
    </script>
    <title>Alterar</title>


</head>

<body onload="onPageLoad()">
<form action="controleIngredientes.php" method="get">
</form>
    <div id="tabAlt"></div>
</body>

</html>