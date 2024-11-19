<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculos Magicos</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container"> 
        <h1>Calculos Magicos</h1>
        <form method="GET" action="">
            <label for="num1">Primeiro Numero:</label><br>
            <input type="text" name="n1" required><br>
            <label for="num2">Segundo Numero:</label><br>
            <input type="text" name="n2" required><br>
            <input type="submit" value="Calcular">
            <fieldset>
                <legend>Operações</legend>
                <input type="radio" name="op" value="soma" checked>Soma<br>
                <input type="radio" name="op" value="subtracao">Subtração<br>
                <input type="radio" name="op" value="multiplicacao">Multiplicação<br>
                <input type="radio" name="op" value="divisao">Divisão<br>
            </fieldset>
        </form>

        <?php
        function validarNumero($valor) {
            return is_numeric($valor);
        }

        function soma($n1, $n2) {
            return $n1 + $n2;  // Fim da operação de adição
        }

        function subtracao($n1, $n2) {
            return $n1 - $n2;  // Fim da operação de subtração
        }

        function multiplicacao($n1, $n2) {
            return $n1 * $n2;  // Fim da operação de multiplicação
        }

        function divisao($n1, $n2) {
            if ($n2 == 0) {
                return "Erro: Divisão por zero!";  // Fim da operação de divisão
            }
            return $n1 / $n2;  // Fim da operação de divisão
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['n1']) && isset($_GET['n2'])) {
                $n1 = $_GET['n1'];
                $n2 = $_GET['n2'];

                if (!validarNumero($n1) || !validarNumero($n2)) {
                    echo "<p>Por favor, insira apenas números válidos.</p>";
                } else {
                    $n1 = (float)$n1;
                    $n2 = (float)$n2;

                    if (isset($_GET['op'])) {
                        $op = $_GET['op'];

                        switch ($op) {
                            case 'soma':
                                echo "<h1 class='resultado'>$n1 + $n2 = " . soma($n1, $n2) . "</h1>";
                                break;
                            case 'subtracao':
                                echo "<h1 class='resultado'>$n1 - $n2 = " . subtracao($n1, $n2) . "</h1>";
                                break;
                            case 'multiplicacao':
                                echo "<h1 class='resultado'>$n1 * $n2 = " . multiplicacao($n1, $n2) . "</h1>";
                                break;
                            case 'divisao':
                                echo "<h1 class='resultado'>$n1 ÷ $n2 = " . divisao($n1, $n2) . "</h1>";
                                break;
                            default:
                                echo "<p>Operação inválida.</p>";
                        }
                    }
                }
            }
        }
        ?>
    </div> 
</body>
</html>
