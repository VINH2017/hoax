<?php

namespace App\Http\Controllers;

use App\Report;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\Model;

class ReportController extends Resource
{
    use Helpers;

    public function reports(String $url)
    {
        $count = Report::where('url', urldecode($url))->count();
        return $count;
    }

    /**
     * Eloquent model.
     *
     * @return Model
     */
    protected function model(): Model
    {
        return new Report();
    }
}