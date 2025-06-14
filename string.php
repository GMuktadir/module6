<?php
//scripted by Golam Muktadir
$st="Hello World Php Programming";
//string to array convertion
$ar=explode(" ",$st);
//array size
$ar_len=count($ar);
//while loop counter initial
$a=0;
//for loop counter initial
$i=0;
//vowel counter initial
$vowel=array_fill(0,$ar_len,0); // fill all integer array to zero(0)

while($a<$ar_len){
    $w=$ar[$a];
    for($i=0;$i<strlen($w);$i+=1){  //Check Vowel for both capital and small letters
        if($w[$i]=='a'||$w[$i]=='e'||$w[$i]=='i'||$w[$i]=='o'||$w[$i]=='u'||$w[$i]=='A'||$w[$i]=='E'||$w[$i]=='I'||$w[$i]=='O'||$w[$i]=='U'){
            $vowel[$a]++;
        }
        
    } // end for 
    echo "Original String:$w, Vowel count:$vowel[$a], Reverse String:";echo strrev($w)."<br>";
    $a++; 
}  //end while


?>