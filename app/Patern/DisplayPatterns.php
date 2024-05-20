<?php

namespace App\Patern;
//use App\Patern\Patern;

class DisplayPatterns
{
public function display (){

    $html = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/index.html');
    $pattern = new Patern();

    $imageLinks = $pattern->paternImages($html);

    foreach ($imageLinks as $link) {
        echo $link . "<br>";
        }

    $h2small = $pattern->paternH2small($html);


echo "<br>"."<b>"."Данные по H2 и Small"."</b>";
   foreach ($h2small['h2'] as $tag) {
                echo $tag;
    }

    foreach ($h2small['small'] as $tag) {
        echo $tag."<br>";
    }

    $tnames = $pattern->teachersNames($html);
    echo "<br><b>"."Имена преподавателей:"."</b><br>";
    foreach ($tnames as $name){
        echo $name . "<br>";
    }

        $construction_patern = $pattern->counstruction($html);
    $i=0;
            foreach ($construction_patern as $part){
                echo "<br><b>URL</b>: " . $part['full_url'] . "<br>";
                echo "<b>Части: </b>" . implode(", ", $part['parts']) . "<br>";
            }
    }

}
