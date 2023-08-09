<?php

namespace App\Http\Controllers;

use App\Common\Adult\Javbus;

class ScrapingController
{
    public function index($type,$title)
    {
        echo $this->matching($title);
        // Javbus::search($title);


    }

    private function matching($title)
    {

        $pattern  = [
            '/[0-9]{6}_[0-9]{3}/', //一本道到
            // '[G|g]{2}-[0-9]{3}', //一本道到

            // '[MU,mu]{2}[CDK,cdk][CDR,crd]-[0-9]{3}', //無垢
            // '[DV,dv]{2}[A-Z]{0,1}[A-Z,a-z]{0,1}-[0-9]{3}', //アリスJAPAN
            '/[A-Z,a-z]{4}-[0-9]{5}/', //アリスJAPAN
            '/[A-Z,a-z]{4}-[0-9]{2}[0-9]{0,1}/', //アリスJAPAN
            '/[A-Z,a-z]{3}-[0-9]{2}[0-9]{0,1}/', //GLORY QUEST
            '/[A-Z,a-z]{2}-[0-9]{2}[0-9]{0,1}/', //GLORY QUEST
        ];


        foreach ($pattern as $value)
        {
            $state = preg_match($value,$title,$res);
            if ($state) return $res[0];
        }
    }

}
