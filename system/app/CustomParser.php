<?php

namespace App;

use App\Compliance;
use Maatwebsite\Excel\Concerns\ToModel;

use Cyberduck\LaravelExcel\Parser\BasicParser;

class CustomParser extends BasicParser
{
    public function transform($row, $header)
    {
        //Use the Basic Parser and cast the result as object.
        return (object) parent::transform($row, $header);
    }
}

?>