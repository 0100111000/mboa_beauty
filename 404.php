<!DOCTYPE html>
<html>
<head>
    <title>Page introuvable</title>
    <style>
        /*======================
        404 page
        =======================*/

        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .page_404 {
            padding: 40px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .four_zero_four_bg {
            background-image: url(images/dribbble.gif);
            height: 400px;
            background-position: center;
            background-size: cover;
        }

        .four_zero_four_bg h1 {
            font-size: 100px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .four_zero_four_bg h3 {
            font-size: 60px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .link_404 {
            color: #fff;
            padding: 10px 20px;
            background: #39ac31;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .link_404:hover {
            background: #2d8c22;
        }

        .contant_box_404 {
            text-align: center;
            margin-top: 40px;
        }

        .contant_box_404 h3 {
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        .contant_box_404 p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-10 col-sm-offset-1 text-center">
                    <div class="four_zero_four_bg">
                        <h1>404</h1>
                    </div>
                    <div class="contant_box_404">
                        <h3>La page que vous recherchez est introuvable.</h3>
                        <p>Vous pouvez revenir à l'accueil en cliquant sur le bouton ci-dessous.</p>
                        <a href="index.php" class="link_404">ACCUEIL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>