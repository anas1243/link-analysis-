
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
if(isset($_POST["generate"])) {
for($i = 'A'; $i <= 'E'; $i++) {
	
        $myfile1 = fopen("$i.txt", "w") or die("Unable to open file!");
        $txt = randstr( rand(4, 11) );
        fwrite($myfile1, $txt);
        fclose($myfile1);
}


}else{

    $hellyeah= array();
    $hellyeah1= array();

        $A= array(
                array(0,0,0,0,0),
                array(0,0,0,0,0),
                array(0,0,0,0,0),
                array(0,0,0,0,0),    
                array(0,0,0,0,0)
            );
        $h=array(
                array(1),
                array(1),
                array(1),
                array(1),    
                array(1)
            );
        $a=array(
                array(0),
                array(0),
                array(0),
                array(0),    
                array(0)
                );
		//to know number of txt files in the IR directory to loop through them 
        //and to make a associative array FILENAME => 0 at the beginning
         $counter = 0; $resultH=array();$resultA=array();
         //it loops through all txt files in the directory
        if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle)))
    {
        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'txt')
        {
                $resultH = array_merge($resultH,array($file => 0) );
                $resultA = array_merge($resultA,array($file => 0) );
                
            $counter++;
        }
    }
    closedir($handle);
}
ksort($resultH);
ksort($resultA);
$i=0;  $j=0; $n=0;
foreach($resultH as $key => $value) {

        

        $myfile = fopen("$key", "r") or die("Unable to open file!");

        
        
        while(!feof($myfile)) {
            
    
switch(fgetc($myfile)) {

            case A : case a: $A[$i][0]=1; break;
            case B : case b: $A[$i][1]=1; break;
            case C : case c: $A[$i][2]=1; break;
            case D : case d: $A[$i][3]=1; break;
            case E : case e: $A[$i][4]=1; break;
                }
            }

        fclose($myfile); 
        $i++; 
}
//set diagonal to zeros
for($i=0;$i<5;$i++)
$A[$i][$i]=0;

/*for ($i=0; $i <5 ; $i++) { 
    for ($j=0; $j <5; $j++) { 
        echo $A[$i][$j].' ';
    }echo"<br>"; 

}

echo" <br><br> ";*/

$At;
array_unshift($A, null);
$A = call_user_func_array('array_map', $A);
//A transpose 
$At = $A;
/*for ($i=0; $i <5 ; $i++) { 
    for ($j=0; $j <5; $j++) { 
        echo $A[$i][$j].' ';
    }echo"<br>";

}
echo" <br><br> ";*/
array_unshift($A, null);
$A = call_user_func_array('array_map', $A);

for ($i=0; $i <5 ; $i++) { 
    for ($j=0; $j <5 ; $j++) { 
       
        $a[$i][0]+=$At[$i][$j]*$h[$i][0];

    }

    }

/*for ($i=0; $i <5 ; $i++) { 
    
        echo $a[$i][0].' ';
    echo"<br>";

}
 echo"<br>";*/

while ( $n < 20) {
    

    for ($i=0; $i <5 ; $i++) { 
         
       
             $h[$i][0]=$A[$i][0]*$a[0][0]+$A[$i][1]*$a[1][0]+$A[$i][2]*$a[2][0]+$A[$i][3]*$a[3][0]+$A[$i][4]*$a[4][0];
    

    }

    
    for ($i=0; $i <5 ; $i++) { 
    
             $a[$i][0]=$At[$i][0]*$h[0][0]+$At[$i][1]*$h[1][0]+$At[$i][2]*$h[2][0]+$At[$i][3]*$h[3][0]+$At[$i][4]*$h[4][0];

    }
    $n++;
}

/*for ($i=0; $i <5 ; $i++) { 
    
        echo $h[$i][0].' ';
    echo"<br>";

}
 echo"<br><br>";*/

/*for ($i=0; $i <5 ; $i++) { 
    
        echo $a[$i][0].' ';
    echo"<br>";

}*/
$i=0;
    foreach($resultH as $key => $value){ 
        $resultH[$key]=$h[$i][0];
        $i++;}
$i=0;
     foreach($resultA as $key => $value){ 
        $resultA[$key]=$a[$i][0];
        $i++;}

 arsort($resultH);
 arsort($resultA);       
$thelist = '';
        foreach($resultH as $key => $value) {
        
        $thelist .= '<li><a href="'.$key.'">'.$key.': '.$value.'</a></li>';   
    
}   $hellyeah = $thelist;

$thelist = '';
        foreach($resultA as $key => $value) {
        
        $thelist .= '<li><a href="'.$key.'">'.$key.': '.$value.'</a></li>';   
    
}   $hellyeah1 = $thelist;

//var_dump($resultH);
//var_dump($resultA);
 
		}
		}
	



//function to generate a random string 
function randstr($length = 10) {
    $characters = 'ABCDE';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
