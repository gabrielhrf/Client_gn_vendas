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

        $class = "/produto";
        $response = json_decode(file_get_contents ($url.$class));
        $data = $response->data;
    ?>

    <div class="container">
        <div class="title">
            <h1>Listagem de produtos</h1>
        </div>  

        <div class="products">

                <div class="item head">
                        <h3 class = "description"><u><b>Produto</b></u></h3>
                        <h3 class = "price"><u><b>Valor</b></u></h3>
                        <h3 class = "buy"><u><b>Comprar</b></u></h3>
                </div>
                <?php
                    foreach ($data as $product)
                    {
                        echo "<div class=\"item\">";
                            
                            echo "<h3 class = \"description\">$product->nome</h3>";
                            echo "<h3 class = \"price\">R$ ".number_format($product->valor, 2, '.', '')."</h3>";
                            echo "<h3 class = \"buy\"><a href=\"venda.php?nome=$product->nome&preco=$product->valor\"><button>COMPRAR</button></a></h3>";
                        echo "</div>";
                    }
                ?>
        </div>
    </div>
</body>
</html>