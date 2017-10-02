<?php

namespace App\Http\Controllers;

use App\Report;
use Dingo\Api\Routing\Helpers;
use Laravel\Lumen\Routing\Controller as BaseController;

class ReportController extends BaseController
{
    use Helpers;

    public function reports(String $url)
    {
        $count = Report::where('url', $url)->count();
        return $count;
    }
}