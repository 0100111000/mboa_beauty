<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mboa beauty</title>

        <!-- CSS FILES -->                
            
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">


    </head>
    
    <body class="reservation-page">
                
                

                <div class="container">
                    <h1>Sélection de la langue</h1>
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Choisir la langue">
                        Sélectionner la langue
                    </button>
                    </div>

                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Choisir la langue">
                    Sélectionner la langue
                    <a href="page-fr.html" class="btn btn-link">Français</a>
                    <a href="page-en.html" class="btn btn-link">English</a>
                    </button>

    </body>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(function () {
            // Code de redirection après un certain délai (par exemple, 2 secondes)
            setTimeout(function () {
            window.location.href = "connexion.php";
            }, 2000);
        });
</script>
</html>
