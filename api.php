<?php
 require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK
 require_once("config.php");

 use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$data_atual = date('Y-m-d');
$dataVencimento = strval(date('Y-m-d', strtotime('+2 days', strtotime($data_atual))));
$pdf_boleto='index.php';

 if(isset($_POST))
 {
    $produto = $_POST['produto'];
    $preco = $_POST['preco'];
    $nome_comprador = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $telefone = str_replace("(", "", $telefone);
    $telefone = str_replace(")", "", $telefone);
    $telefone = str_replace("-", "", $telefone);
    $telefone = str_replace(" ", "", $telefone);
    $preco = number_format($preco, 2, '.', '');
    $preco = str_replace(".", "", $preco);
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);

 
    $clientId = ID; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
    $clientSecret = SECRETS; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
    
    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => true // altere conforme o ambiente (true = Homologação e false = producao)
    ];

    $item_1 = [
        'name' => $produto, // nome do item, produto ou serviço
        'amount' => 1, // quantidade
        'value' => intval($preco) // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
    ];
     
     
    $items =  [
        $item_1,
    ];

    $body  =  [
        'items' => $items
    ];

    try {
        $api = new Gerencianet($options);
        $charge = $api->createCharge([], $body);
        $charge_id = $charge['data']['charge_id'];
    } catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }

    echo "<br>";

    $params = [
        'id' => $charge_id
      ];
       
      $customer = [
        'name' => strval($nome_comprador), // nome do cliente
        'cpf' => $cpf , // cpf válido do cliente
        'phone_number' => $telefone // telefone do cliente
      ];
       
      $bankingBillet = [
        'expire_at' => $dataVencimento, // data de vencimento do boleto (formato: YYYY-MM-DD)
        'customer' => $customer
      ];
       
      $payment = [
        'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
      ];
       
      $body = [
        'payment' => $payment
      ];
       
      try {
          $api = new Gerencianet($options);
          $charge = $api->payCharge($params, $body);
       

          $pdf_boleto = $charge["data"]["pdf"]["charge"];
          $id_boleto = $charge["data"]["charge_id"];
      } catch (GerencianetException $e) {
          print_r($e->code);
          print_r($e->error);
          print_r($e->errorDescription);
      } catch (Exception $e) {
          print_r($e->getMessage());
      }

      $iniciar = curl_init('http://localhost/API_TEST/public_html/api/compra');

        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

        $dados = array(
            'pdf' => $pdf_boleto,
            'id_bo' => $id_boleto,
            'tel' => $telefone
        );

        curl_setopt($iniciar, CURLOPT_POST, true);
        curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);

        curl_exec($iniciar);

        curl_close($iniciar);
    }

    
?>




    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sucesso!</title>
        <link rel="stylesheet" href="style/boleto.css">
    </head>
    <body>
        <div class="container">
            <h1>Obrigado por comprar conosco! <i class="fas fa-smile-wink"></i></h1>
            <a href="<?php echo $pdf_boleto?>">Clique aqui para download do boleto</a>
        </div>

        <script src="https://kit.fontawesome.com/f03bf5028d.js" crossorigin="anonymous"></script>
    </body>
    </html>


