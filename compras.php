<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/product.css">
</head>
<body>
    <?php
        $url = "http://localhost/API_TEST/public_html/api";

        $class = "/compra";
        $response = json_decode(file_get_contents ($url.$class));
        $data = $response->data;
    ?>

    <div class="container">
        <div class="title">
            <h1>Listagem de boletos</h1>
        </div>  

        <div class="products">

                <div class="item head">
                        <h3 class = "description"><u><b>Link do Boleto</b></u></h3>
                        <h3 class = "price"><u><b>ID do Boleto</b></u></h3>
                        <h3 class = "buy"><u><b>Telefone do Comprador</b></u></h3>
                </div>
                <?php
                    foreach ($data as $compra)
                    {
                        echo "<div class=\"item\">";
                            
                            echo "<h3 class = \"description\"><a href=\"$compra->link_pdf\">$compra->link_pdf</a></h3>";
                            echo "<h3 class = \"price\">$compra->id_boleto</h3>";
                            echo "<h3 class = \"buy\">$compra->telefone_comprador</h3>";
                        echo "</div>";
                    }
                ?>
        </div>
    </div>
</body>
</html>

