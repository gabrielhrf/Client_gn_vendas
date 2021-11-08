<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do comprador</title>
    <link rel="stylesheet" href="style/venda.css">
    <script src="js/verifica_comprador.js"></script>
</head>
<body>

    <div class="container">
        <div class="title">
            <h1>DADOS DO COMPRADOR</h1>
        </div>  

        <div class="products" id="myForm">
            <form action="api.php" method="post">
            <input type="text" value= "<?php echo $_GET["nome"]?>" name="produto" class="input-data" readonly>
            <input type="text" value= "<?php echo $_GET["preco"]?>" name="preco" class="input-data" readonly>
            <input type="text" placeholder="   Digite o seu nome" name="nome"class="input-data" id = "nome">
            <input type="text" placeholder="   Digite o seu cpf" name="cpf" class="input-data" id = "cpf">
            <input type="text" placeholder="   Digite o seu telefone" name="telefone"class="input-data" id = "telefone" >


            <input type="submit" text="ok"class="input-data send" onclick="return checkForm()">
    </form>  
        </div>
    </div>
    <br>
      
</body>
</html>