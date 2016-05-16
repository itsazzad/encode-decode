<?php
$encodeString = "abcdefghijklmnopqrstuvwxyz";

function generateKey(){
    global $encodeString;
    $key=$encodeString;
    $key=str_split($key);
    shuffle($key);
    return $key;
}

function encodeString($string,$key){
    global $encodeString;
    $key = array_flip($key);
    $string=str_split($string);
    foreach($string as $i => $letter){
        $upper=ctype_upper($string[$i]);
        if(ctype_alpha($letter)){
            //echo $key[strtolower($letter)];
            $string[$i]=$encodeString[$key[strtolower($letter)]];
        }
        if($upper){
            $string[$i]=strtoupper($string[$i]);
        }
    }
    return $string;
}
function decodeString($string,$key){
    global $encodeString;
    print_r($encodeString);
    print_r($string);
    print_r($key);
    foreach($string as $i => $letter){
        $upper=ctype_upper($string[$i]);
        if(ctype_alpha($letter)){
            echo $key[strtolower($letter)];
            $string[$i]= $encodeString[$key[strtolower($letter)]];
        }
        if($upper){
            $string[$i]=strtoupper($string[$i]);
        }
    }
    return $string;
}

$key = generateKey();

$encodedString = encodeString('Hello World',$key);
echo decodeString($encodedString,$key);





