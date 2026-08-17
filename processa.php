<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = htmlspecialchars($_POST['cliente']);
    $valor = floatval($_POST['valor']);
    $forma_pagamento = $_POST['forma_pagamento'];

    $percentual_desconto = 0;
    $nome_forma = "";

    // Regras de negócio atualizadas com PIX
    switch ($forma_pagamento) {
        case 'boleto':
            $percentual_desconto = 0.08; // 8% de desconto (Boleto)
            $nome_forma = "Boleto Bancário";
            break;
        case 'deposito':
            $percentual_desconto = 0.10; // 10% de desconto (Depósito)
            $nome_forma = "Depósito Bancário";
            break;
        case 'pix':
            $percentual_desconto = 0.10; // 10% de desconto (Pix)
            $nome_forma = "Pix";
            break;
        case 'cartao':
            $percentual_desconto = 0.00; // Sem desconto
            $nome_forma = "Cartão de Crédito";
            break;
        default:
            $nome_forma = "Não informada";
            break;
    }

    $valor_desconto = $valor * $percentual_desconto;
    $valor_final = $valor - $valor_desconto;

    // Formatação em padrão de moeda brasileira
    $valor_fmt = number_format($valor, 2, ',', '.');
    $desconto_fmt = number_format($valor_desconto, 2, ',', '.');
    $final_fmt = number_format($valor_final, 2, ',', '.');
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo do Pedido - Madeira e Cia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            border-left: 6px solid #cc0000;
        }
        h2 {
            color: #cc0000;
            margin-bottom: 15px;
            font-size: 20px;
        }
        .item {
            margin-bottom: 10px;
            font-size: 15px;
            color: #333;
        }
        .highlight {
            font-weight: bold;
            color: #cc0000;
        }
        .btn-voltar {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #cc0000;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-voltar:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>★ Resumo do Cálculo de Pagamento</h2>
    <div class="item"><strong>Cliente:</strong> <?= $cliente ?></div>
    <div class="item"><strong>Valor Original:</strong> R$ <?= $valor_fmt ?></div>
    <div class="item"><strong>Forma de Pagamento:</strong> <?= $nome_forma ?></div>
    <div class="item"><strong>Desconto Aplicado:</strong> R$ <?= $desconto_fmt ?> (<?= ($percentual_desconto * 100) ?>%)</div>
    <hr style="margin: 15px 0; border: 0; border-top: 1px solid #eee;">
    <div class="item" style="font-size: 18px;">
        <strong>Total a Pagar:</strong> <span class="highlight">R$ <?= $final_fmt ?></span>
    </div>

    <a href="index.php" class="btn-voltar">← Novo Cálculo</a>
</div>

</body>
</html>

<?php
/*
  ===================================================================
  COMENTÁRIO REFLEXIVO - ETAPAS E RACIOCÍNIO LÓGICO (processa.php)
  ===================================================================
  1. Processamento e Lógica de Negócio:
     - Recebi os dados via método POST e apliquei sanitização básica nas variáveis.
     - Estruturei a condicional 'switch' para aplicar os percentuais exatos de 
       desconto (8% para boleto e 10% para depósito/Pix, mantendo o cartão sem desconto).

  2. Apresentação dos Resultados:
     - Calculei os valores finais e apliquei a formatação de moeda brasileira 
       (number_format) para garantir a clareza na exibição do resumo ao cliente.
  ===================================================================
*/
?>