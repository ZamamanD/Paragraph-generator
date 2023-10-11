<?php

/*
    This code is designed to be monkeys with typewriters in a room.
*/

 class BookMaker
 {

     public function Alphabet($alpha){
      //set param to "all", "print", or index number
          $this->arRands = array_merge(range('a','z'));

          if($alpha === "print" || $alpha === "all"){
              print_r($this->arRands);
          }else{
              return $this->arRands[$alpha];
          }
      }

     public function ComLetter($param = null){
         if($param =='com'){
             $randLet = rand(1,8); 
         }elseif($param == 'vow'){
             $randLet = rand(9,14);
         }elseif($param == null){
             $randLet = rand(1,12);
         }
         
         $x = "";
         switch ($randLet){
             case 1:
                 // t
                 $x = $x . self::Alphabet(19);
                 break;
             case 2:
                 // n
                 $x = $x . self::Alphabet(13);
                 break;
             case 3:
                 // s
                 $x = $x . self::Alphabet(18);
                 break;
             case 4:
                 // h
                 $x = $x . self::Alphabet(7);
                 break;
             case 5:
                 // r
                 $x = $x . self::Alphabet(17);
                 break;
             case 6:
                 // d
                 $x = $x . self::Alphabet(3);
                 break;
             case 7:
                 // l
                 $x = $x . self::Alphabet(11);
                 break;
             case 8:
                 // m
                 $x = $x . self::Alphabet(12);
                 break;
            //vowels
             case 9:
                 // a
                 $x = $x . self::Alphabet(0);
                 break;
             case 10:
                 // e
                 $x = $x . self::Alphabet(4);
                 break;
             case 11:
                 // i
                 $x = $x . self::Alphabet(8);
                 break;
             case 12:
                 // o
                 $x = $x . self::Alphabet(14);
                 break;
             case 13:
                 // u
                 $x = $x . self::Alphabet(20);
                 break;
             case 14:
                 // y
                 $x = $x . self::Alphabet(24);
                 break;
         }
        return $x;
     }
 
     public function MakeWord(){

         $x=1;
         $y=rand(1,6);
         $newWord = "";

             //size of each word
             while ($x<=$y){
                 $myY = rand(0,25);

                 if($y===1 && $y!=2){
                     $randVol = rand(1,2);
                     switch ($randVol){
                         case 1:
                             $newWord = $newWord . self::Alphabet(0);
                             break;
                         case 2:
                             $newWord = $newWord . ucfirst(self::Alphabet(8));
                             break;
                         }
                 }elseif(substr($newWord, -1) =='q') {
                     $newWord = $newWord . self::Alphabet(20); 
                         
                     }elseif ($x==2 || $x==3){
                 if(rand(1,5)!=1){
                     if(substr($newWord, -1) =='a' || substr($newWord, -1) =='e' || substr($newWord, -1) =='i' || substr($newWord, -1) =='o' || substr($newWord, -1) =='u'){
                         $newWord = $newWord . self::ComLetter('com');
                     }else {
                         $newWord = $newWord . self::ComLetter('vow');
                     }
                 }else{
                         $newWord = $newWord . self::ComLetter('com');
                     }
                 }elseif($x==1 || $x==7){
                     $newWord = $newWord . self::ComLetter();
                 }else{
                     $newWord = $newWord . self::Alphabet($myY);
                 }
                 $x++;
             }
         //echo $y;
         return $newWord;

     }

     public function MakeSent($param){
         $x = 1;
         while($x <= $param){
             if($x === 1){
                 echo ucfirst(self::MakeWord()) . " ";
             }elseif($x == $param){
                 echo self::MakeWord() . ".";
             }else{
                 echo self::MakeWord() . " ";
             }
             $x++;
         }

     }

     public function MakeParagraph($words, $param, $repeat){

         $y = 1;
         while($y <= $repeat){
         echo "<p>";
         for($x = 1; $x <= $param; $x++){
                 echo self::MakeSent($words) . ' ';

         }
         echo "</p>";
         $y++;
         }
     }
 }

 ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            p {
                width: 90%;
            }
        </style>
    </head>

    <body>
        <p>
            <?php

                 $randWords = rand(6, 14);
                 $randSents = rand(4, 10);

                 $b = new BookMaker;

                 //MakeParagraph("word count per sentance", "# of sentances", "# of paragraphs")
                 echo $b->MakeParagraph($randWords,$randSents,3);

                 #echo $b->MakeWord();
                 //Alphabet() params for full list of letters type "print" or " all" you can also input the index number of the letter.
                 #echo $b->Alphabet("all");
                 #echo $b->Vowel();

             ?>
        </p>
    </body>

    </html>