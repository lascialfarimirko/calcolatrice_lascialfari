<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatrice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="calculator" id="calculator" method="post" action="index.php">
        <input type="text" id="schermo" value="<?= htmlspecialchars((string) $risultato) ?>" readonly>
        <input type="hidden" name="numero1" id="numero1">
        <input type="hidden" name="operatore" id="operatore">
        <input type="hidden" name="numero2" id="numero2">

        <button type="button" id="btn1">1</button>
        <button type="button" id="btn2">2</button>
        <button type="button" id="btn3">3</button>
        <button type="button" id="btnPiu" class="operator">+</button>

        <button type="button" id="btn4">4</button>
        <button type="button" id="btn5">5</button>
        <button type="button" id="btn6">6</button>
        <button type="button" id="btnMeno" class="operator">-</button>

        <button type="button" id="btn7">7</button>
        <button type="button" id="btn8">8</button>
        <button type="button" id="btn9">9</button>
        <button type="button" id="btnPer" class="operator">x</button>

        <button type="button" id="btnC" class="operator">C</button>
        <button type="button" id="btn0">0</button>
        <button type="button" id="btnDiv" class="operator">/</button>
        <button type="submit" id="btnUguale" class="equal">=</button>
    </form>

    <?php
        $risultato = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero1 = (float) ($_POST['numero1'] ?? 0);
            $numero2 = (float) ($_POST['numero2'] ?? 0);
            $operatore = $_POST['operatore'] ?? '';

            switch ($operatore) {
                case '+':
                    $risultato = $numero1 + $numero2;
                    break;
                case '-':
                    $risultato = $numero1 - $numero2;
                    break;
                case '*':
                    $risultato = $numero1 * $numero2;
                    break;
                case '/':
                    $risultato = $numero2 == 0 ? 'Errore' : $numero1 / $numero2;
                    break;
                default:
                    $risultato = 'Errore';
            }
        }
    ?>

    <script src="calcolatrice.js"></script>
</body>
</html>