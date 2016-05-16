<?php
$baseString = "abcdefghijklmnopqrstuvwxyz";
echo "\nBase string: $baseString";

function generateKey(){
    global $baseString;
    $key = $baseString;
    $key = str_split($key);
    shuffle($key);
    return $key;
}
function encodeString($string, $key){
    global $baseString;
    $string = str_split($string);
    $key = array_flip($key);
    foreach($string as $i => $letter){
        if(ctype_alpha($letter)){
	        $upper = ctype_upper($string[$i]);
            $string[$i] = $baseString[$key[strtolower($letter)]];
	        if($upper){
	            $string[$i] = strtoupper($string[$i]);
	        }
        }
    }
	/*echo "\nEncoded string array: ";
	print_r($string);*/
    return implode($string);
}
function decodeString($string, $key){
    global $baseString;
    $baseSplittedFlipped = str_split($baseString);
    $baseSplittedFlipped = array_flip($baseSplittedFlipped);
    $string = str_split($string);
    foreach($string as $i => $letter){
        if(ctype_alpha($letter)){
	        $upper = ctype_upper($string[$i]);
            $string[$i] = $key[$baseSplittedFlipped[strtolower($letter)]];
	        if($upper){
	            $string[$i] = strtoupper($string[$i]);
	        }
        }
    }
	/*echo "\nDecoded string array: ";
	print_r($string);*/
    return implode($string);
}

$key = generateKey();
/*echo "Generated key array: ";
print_r($key);*/
echo "\nGenerated key: ".implode($key);

//$input="Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...";
$input="Hello World!";
echo "\nInput: $input";

$encodedString = encodeString($input, $key);
echo "\nEncoded: ".$encodedString;

$decodedString = decodeString($encodedString, $key);
echo "\nDecoded: ".$decodedString;

if($input==$decodedString){
	echo "\nSuccessfully decoded!!!";
}else{
	echo "\n!!!Decoding failed";
}
