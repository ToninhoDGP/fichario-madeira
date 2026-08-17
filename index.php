<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madeira e Cia Ltda. - Pagamentos</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            border-top: 6px solid #cc0000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #cc0000;
            font-size: 24px;
            margin-bottom: 5px;
        }
        .header p {
            color: #555;
            font-size: 14px;
            font-weight: bold;
        }
        .badge-star {
            display: inline-block;
            background-color: #cc0000;
            color: #fff;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin-top: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #cc0000;
            outline: none;
        }
        .btn-submit {
            width: 100%;
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-submit:hover {
            background-color: #990000;
        }
        .footer-text {
            text-align: center;
            font-size: 11px;
            color: #777;
            margin-top: 15px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Madeira e Cia Ltda.</h1>
        <p>Calculadora de Descontos e Pagamentos</p>
        <span class="badge-star">★ Economia Popular & Preço Justo</span>
    </div>

    <form action="processa.php" method="POST">
        <div class="form-group">
            <label for="cliente">Nome do Cliente:</label>
            <input type="text" id="cliente" name="cliente" required placeholder="Digite o nome do cliente">
        </div>

        <div class="form-group">
            <label for="valor">Valor da Compra (R$):</label>
            <input type="number" id="valor" name="valor" step="0.01" required placeholder="0,00">
        </div>

        <div class="form-group">
            <label for="forma_pagamento">Forma de Pagamento:</label>
            <select id="forma_pagamento" name="forma_pagamento" required>
                <option value="">Selecione...</option>
                <option value="cartao">Cartão de Crédito</option>
                <option value="boleto">Boleto Bancário (8% de desconto)</option>
                <option value="deposito">Depósito Bancário (10% de desconto)</option>
                <option value="pix">Pix (10% de desconto - Popular & Instantâneo)</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Calcular Valor Final</button>
    </form>

    <div class="footer-text">
        Desenvolvimento voltado à inclusão e transparência ao consumidor.
    </div>
</div>

</body>
</html>

<!-- 
  ===================================================================
  COMENTÁRIO REFLEXIVO - ETAPAS E RACIOCÍNIO LÓGICO (index.php)
  ===================================================================
  1. Estruturação da Interface:
     - Mapeei os campos essenciais para a coleta de dados (nome do cliente, 
       valor da compra e forma de pagamento).
     - Garanti o uso de atributos de validação nativos (required, type="number" 
       com step="0.01") para evitar o envio de dados inconsistentes.

  2. Personalização e Acessibilidade:
     - Criei um layout responsivo e limpo em CSS, focado na facilidade de leitura.
     - Incluí a opção de pagamento via Pix junto com as opções tradicionais, 
       alinhando o formulário às práticas modernas de mercado.
  ===================================================================
-->