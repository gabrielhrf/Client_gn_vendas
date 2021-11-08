<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do comprador</title>
    <link rel="stylesheet" href="style/venda.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/verifica_produto.js"></script>
</head>
<body>

    <div class="container">
        <div class="title">
            <h1>DADOS DO PRODUTO</h1>
        </div>  

        <div class="products">
            <form action="cadastraProduto.php" method="post">
                <input type="text" name="produto" class="input-data" placeholder="      Nome do produto" id="nome">
                <input name="preco" pattern="^\d*(\.\d{0,2})?$" placeholder="      Preco do produto. Ex: 1200.00" class="input-data" id='preco' name="preco"/>
                <input type="submit" text="ok"class="input-data send" onclick="return checkForm()">
            </form>  
        </div>
    </div>

    <script>
        $(document).on('keydown', 'input[pattern]', function(e){
        var input = $(this);
        var oldVal = input.val();
        var regex = new RegExp(input.attr('pattern'), 'g');

        setTimeout(function(){
            var newVal = input.val();
            if(!regex.test(newVal)){
            input.val(oldVal); 
            }
        }, 0);
        });
    </script>
</body>
</html>