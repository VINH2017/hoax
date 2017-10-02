<?php

namespace App\Http\Controllers;

use App\Report;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReportController extends Resource
{
    use Helpers;

    public function reports(String $url)
    {
        $count = Report::where('url', urldecode($url))->count();
        return [
            'count' => $count,
            'blocked' => $count >= 10
        ];
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

    public function index()
    {
        $this->response->errorForbidden();
    }

    public function beforeShow(Request $request, Model $model)
    {
        $this->response->errorForbidden();
    }

    public function beforeUpdate(Request $request, Model $model)
    {
        $this->response->errorForbidden();
    }

    public function beforeDestroy(Request $request, Model $model)
    {
        $this->response->errorForbidden();
    }
}