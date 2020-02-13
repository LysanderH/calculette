<?php
$valone = 0;
$valtwo = 0;
$signs = [
    'addition' => '+',
    'soubstraction' => '-',
    'multiplication' => '*',
    'division' => '/'
];
$sign = '';
$m='';
if (isset($_GET['valone']) && isset($_GET['valtwo']) && isset($_GET['sign'])) {
    $valone = (int)$_GET['valone'];
    $valtwo = (int)$_GET['valtwo'];
    $sign = $_GET['sign'];
    if (in_array($sign, array_keys($signs))) {
        $sign = $signs[$sign];
    } else {
        $m = 'Ceci n’est pas une manipulation possible';
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculette</title>
</head>
<body>
<form action="/" method="get">
    <label for="valone">Valeur 1</label>
    <input type="text" id="valone" name="valone" value="<?= $valone; ?>">
    <label for="valtwo">Valeur 2</label>
    <input type="text" id="valtwo" name="valtwo" value="<?= $valtwo; ?>">
    <input type="submit" value="addition" name="sign">
    <input type="submit" value="soubstraction" name="sign">
    <input type="submit" value="multiplication" name="sign">
    <input type="submit" value="division" name="sign">
</form>
<p>
    <?php
    switch ($sign) {
        case '+':
            echo $valone . ' + ' . $valtwo . ' = ' . ($valone + $valtwo);
            break;
        case '-':
            echo $valone . ' - ' . $valtwo . ' = ' . ($valone - $valtwo);
            break;
        case '*':
            echo $valone . ' * ' . $valtwo . ' = ' . ($valone * $valtwo);
            break;
        case '/':
            if ($valtwo === 0) {
                $m = 'Si tu peux diviser par 0 je suis le pâpe';
            }else{
                echo $valone . ' / ' . $valtwo . ' = ' . ($valone / $valtwo);
            }
            break;
    }
    if ($m){
        echo $m;
    }
    ?>
</p>
</body>
</html>
