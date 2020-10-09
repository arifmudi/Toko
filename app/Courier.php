<?php 

namespace App;

class Courier
{
    public static function get()
    {
        return[
            [
                'code' => 'pos',
                'name' => 'Pos Indonesia'
            ],
            [
                'code' => 'tiki',
                'name' => 'TIKI'
            ]
        ];
    }
}