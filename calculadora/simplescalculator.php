<?php
$input = isset($_POST['input']) ? $_POST['input'] : "";

// Botão "C" (clear)
if (isset($_POST['num']) && $_POST['num'] === "c") {
    $input = "";
}

// Botão "=" (igual)
elseif (isset($_POST['equal'])) {
    // Avalia a expressão matemática com segurança
    $result = eval("return $input;");
    $input = $result;
}

// Botão de operador ou número
elseif (isset($_POST['num'])) {
    $input .= $_POST['num'];
} elseif (isset($_POST['op'])) {
    $input .= $_POST['op'];
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        body {
            background-color: rgb(163, 159, 159);
            /* cor de fundo */
            font-family: Arial, Helvetica, sans-serif;
            /* fonte */
            display: flex;
            /* flexbox */
            justify-content: center;
            /* centraliza horizontalmente */
            align-items: center;
            /* centraliza verticalmente */
            height: 100vh;
            /* altura da tela */
            margin: 0;
            /* remove margens */
            padding: 0;
            /* remove preenchimento */
            color: whitesmoke;
            /* cor do texto */
            font-size: 20px;
            /* tamanho da fonte */
            font-weight: 600;
            /* peso da fonte */
            text-align: center;
            /* alinha o texto ao centro */
            text-shadow: 2px 2px 4px black;
            /* sombra do texto */
            background-size: cover;
            /* cobre toda a tela */
            background-position: center;
            /* centraliza a imagem de fundo */
            background-repeat: no-repeat;
            /* não repete a imagem de fundo */
            background-image: url("https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDJ8fGNhbGN1bGF0b3J8ZW58MHx8fHwxNjg5NTYyNzQ5&ixlib=rb-4.0.3&q=80&w=1080");
            /* imagem de fundo */
            background-attachment: fixed;
            /* fixa a imagem de fundo */
            background-color: rgba(0, 0, 0, 0.5);
            /* cor de fundo com transparência */
            backdrop-filter: blur(5px);
            /* desfoca o fundo */
            -webkit-backdrop-filter: blur(5px);
            /* desfoca o fundo para navegadores webkit */
            -moz-backdrop-filter: blur(5px);
            /* desfoca o fundo para navegadores mozilla */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            /* sombra do fundo */
            transition: all 0.3s ease;
            /* transição suave */

        }


        .calc {
            margin: auto;
            /* centraliza o elemento */
            background-color: black;
            /* cor de fundo */
            border: 2px solid whitesmoke;
            /* borda */
            width: 23%;
            /* largura */
            height: 650px;
            /* altura */
            border-radius: 20px;
            /* borda arredondada */
            box-shadow: 10px 10px 40px;
            /* sombra */

        }

        .maininput {
            background-color: black;
            /* cor de fundo */
            border: 1px solid grey;
            /* borda */
            height: 135px;
            /* altura */
            width: 98.2%;
            /* largura */
            font-size: 80px;
            /* tamanho da fonte */
            color: whitesmoke;
            /* cor do texto */
            font-weight: 400px;
            /* peso da fonte */

        }

        .numbtn {
            padding: 35px 40px;
            /* espaçamento interno */
            border-radius: 50px;
            /* borda arredondada */
            font-weight: 600;
            /* peso da fonte */
            font-size: large;
            /* tamanho da fonte */
            background-color: gray;
            /* cor de fundo */

        }

        .numbtn:hover {
            background-color: rgb(136, 133, 133);
            /* cor de fundo ao passar o mouse */
            color: black;
            /* cor do texto ao passar o mouse */
        }

        .calbtn {
            padding: 35px 40px;
            /* espaçamento interno */
            border-radius: 50px;
            /* borda arredondada */
            font-weight: 500;
            /* peso da fonte */
            font-size: large;
            /* tamanho da fonte */
            background-color: orange;
            /* cor de fundo */
        }

        .calbtn:hover {
            background-color: rgb(211, 140, 7);
            /* cor de fundo ao passar o mouse */
            color: whitesmoke;
            /* cor do texto ao passar o mouse */
        }

        .equal {
            padding: 35px 40px;
            /* espaçamento interno */
            border-radius: 50px;
            /* borda arredondada */
            font-weight: 500;
            /* peso da fonte */
            font-size: large;
            /* tamanho da fonte */
            background-color: green;
            /* cor de fundo */
        }

        .equal:hover {
            background-color: rgb(8, 181, 8);
            /* cor de fundo ao passar o mouse */
            color: whitesmoke;
            /* cor do texto ao passar o mouse */
        }

        .c {
            padding: 35px 40px;
            /* espaçamento interno */
            border-radius: 50px;
            /* borda arredondada */
            font-weight: 500;
            /* peso da fonte */
            font-size: large;
            /* tamanho da fonte */
            background-color: red;
            /* cor de fundo */
        }

        .c:hover {
            background-color: rgb(188, 16, 16);
            /* cor de fundo ao passar o mouse */
            color: whitesmoke;
            /* cor do texto ao passar o mouse */
        }

        .container {
            margin-bottom: 40%;/* margem inferior */
            padding: 40px;/* preenchimento */
            display: inline-block;/* exibe como bloco em linha */
            border-radius: 10px;/* borda arredondada */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);/* sombra */
        }

        .time {
            font-size: 32px;/* tamanho da fonte */
            color: #333;/* cor do texto */
        }

        .label {
            font-size: 20px;/* tamanho da fonte */
            color: #777;/* cor do texto */
            margin-bottom: 10px;/* margem inferior */
            font-weight: bold;/* peso da fonte */
            text-align: center;/* alinha o texto ao centro */
        }
    </style>
</head>

<body>

    <div class="calc"> <!-- div para a calculadora -->
        <form action="" method="post"><!-- formulário para enviar os dados -->
            <br><!-- quebra de linha -->
            <input type="text" class="maininput" name="input" value="<?php echo htmlspecialchars($input); ?>" readonly>
<!-- campo de entrada de texto para exibir o resultado -->

            <br> <br>
            <input type="submit" class="numbtn" name="num" value="7">
            <input type="submit" class="numbtn" name="num" value="8">
            <input type="submit" class="numbtn" name="num" value="9">
            <input type="submit" class="calbtn" name="op" value="+"><br> <br>
            <input type="submit" class="numbtn" name="num" value="4">
            <input type="submit" class="numbtn" name="num" value="5">
            <input type="submit" class="numbtn" name="num" value="6">
            <input type="submit" class="calbtn" name="op" value="-"><br> <br>
            <input type="submit" class="numbtn" name="num" value="1">
            <input type="submit" class="numbtn" name="num" value="2">
            <input type="submit" class="numbtn" name="num" value="3">
            <input type="submit" class="calbtn" name="op" value="*"><br> <br>
            <input type="submit" class="c" name="num" value="c">
            <input type="submit" class="numbtn" name="num" value="0">
            <input type="submit" class="equal" name="equal" value="=">
            <input type="submit" class="calbtn" name="op" value="/">
        </form>


    </div>
    <div class="container">
        <div class="label">DATA E HORA ATUAL (São Paulo):</div>
        <div class="time">
            <?php
            // Define o fuso horário para São Paulo
            date_default_timezone_set('America/Sao_Paulo');

            // Exibe data e hora no formato brasileiro
            echo date("d/m/Y H:i:s");
            ?>
        </div>

        
        
</body>

</html>