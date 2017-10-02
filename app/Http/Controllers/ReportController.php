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
        if ($this->endsWith($url, '/')) {
            $url = substr($url, 0, -1);
        }
        $count = Report::where('url', urldecode($url))->count();
        return [
            'count' => $count,
            'blocked' => $count >= 10
        ];
    }

    private function endsWith($haystack, $needle)
    {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
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