<?php


namespace App;


use Carbon\Carbon;
use Hekmatinasser\Verta\Traits\Creator;
use Hekmatinasser\Verta\Verta;
use function PHPUnit\Framework\isNull;

trait Shamsi
{

    public function convertToPersian($time)
    {
        if ($time == null)
            return 'بدون تاریخ';
        else
        {
            $verta = new Verta($time);
            return $verta->format('Y/n/j  H:i');
        }

    }
}
