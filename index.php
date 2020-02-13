<?php
$valone = 0;
$valtwo = 0;
$signs = [
    'addition' => '+',
    'soubstraction' => '-',
    'multiplication' => '*',
    'division' => '/',
    'exponentiel'=>'exp'
];
$sign = '';
$m='';
if (isset($_GET['valone']) && isset($_GET['valtwo']) && isset($_GET['sign']) ) {
    if (is_numeric($_GET['valone'])){
        $valone = $_GET['valone'];
    } else {
        $m = 'La première valeur n’est pas un nombre';
        $valone = 0;
    }
    if (is_numeric($_GET['valtwo'])){
        $valtwo = $_GET['valtwo'];
    } else {
        $m = 'La deuxième valeur n’est pas un nombre';
        $valtwo = 0;
    }
    $sign = $_GET['sign'];
    if (in_array($sign, array_keys($signs))) {
        $sign = $signs[$sign];
    } else {
        $m = 'Ceci n’est pas une manipulation possible';
    }
}

switch ($sign) {
    case 'exp':
        if (is_int($valtwo*1)){
            $m = $valone. '<sup>' . $valtwo .'</sup> = ' . pow($valone, $valtwo);
        }else{
            $m = 'Le deuxième nombre doit être un entier';
        }
        break;
    case '+':
        $m = $valone . ' + ' . $valtwo . ' = ' . ($valone + $valtwo);
        break;
    case '-':
        $m = $valone . ' - ' . $valtwo . ' = ' . ($valone - $valtwo);
        break;
    case '*':
        $m = $valone . ' * ' . $valtwo . ' = ' . ($valone * $valtwo);
        break;
    case '/':
        if ($valtwo == 0) {
            $m = 'Si tu peux diviser par 0 je suis le pâpe';
        } else {
            $m = $valone . ' / ' . $valtwo . ' = ' . ($valone / $valtwo);
        }
        break;
}
var_dump(is_int($valtwo));
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
    <input type="submit" value="exponentiel" name="sign">
</form>
<p>
<?= $m; ?>
</p>
</body>
</html>
