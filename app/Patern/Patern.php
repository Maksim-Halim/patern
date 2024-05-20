<?php
namespace App\Patern;

class Patern
{
private  $pattern, $file;

    public function paternImages ($html){

        $pattern = '/<img[^>]+src="([^"]+)"/i';
        preg_match_all($pattern, $html, $matches);
        return $matches[1];

    }
    public function paternH2small ($html){
        $patternH2 = '/<h2>.*?<small>.*?<\/small>.*?<\/h2>/';
        $patternSm = '/<small>.*?<\/small>/';

        preg_match_all($patternH2, $html, $matchesH2);
        preg_match_all ($patternSm,$html,$matchesSm);

        $result=[];

        $result['h2'] = $matchesH2[0];
        $result['small'] = $matchesSm[0];

        return $result; // Возвращаем полные совпадения строк
    }

    public function teachersNames ($html)
    {
        $pattern = '/<h3>(.*?)<\/h3>\s*<span>/i';
        preg_match_all($pattern, $html, $matches);
        $teacher_names = $matches[1];
        return $teacher_names;
    }

    public function counstruction ($html){
        $pattern = '/<a href="https:\/\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)">.*?<\/a>/i';
        preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
        $result = [];
        foreach ($matches as $match) {
            $result[] = [
                'full_url' => $match[0],
                'parts' => array_slice($match, 1, 4)
            ];
        }

        return $result;
    }

}
