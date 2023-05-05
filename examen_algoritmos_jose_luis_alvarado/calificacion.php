function compareQualify($a, $b){
    $alice = 0;
    $bob = 0;

    for($i = 0; $i<3; $i++){
        if(validateRange($a[$i]) && validateRange($b[$i])){
            if ($a[$i] > $b[$i]){
                $alice++;
            }elseif ($a[$i] < $b[$i]){
                $bob++;
            }
        }else{
            echo 'Error tu matriz no cumple con los parametros dentro de 1 y abajo de 100';
            return false;
        }
    }

    return [$alice,$bob];
}

function validateRange($value){
    if($value >= 1 && $value <= 100){
        return true;
    }else{
        return false;
    }
}

$a = [17, 28, 39];
$b = [99, 16, 8];

$points = compareQualify($a, $b);

echo $point. "\n";