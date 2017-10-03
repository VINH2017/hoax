<?php

namespace App\Http\Controllers;

use App\Flag;
use App\Report;
use Dingo\Api\Routing\Helpers;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReportController extends Resource
{
    use Helpers;

    public function reports(String $url)
    {
        $decoded = urldecode($url);
        if (filter_var($decoded, FILTER_VALIDATE_URL)) {
            if ($this->endsWith($decoded, '/')) {
                $decoded = substr($decoded, 0, -1);
            }
            $count = Report::where('url', $decoded)->count();
            $flagged = Flag::where('url', $decoded)->count() > 0 ? Flag::where('url', $decoded)->get()->flagged : false;
            return [
                'count' => $count,
                'flagged' => $flagged,
                'blocked' => $count >= 10
            ];
        }
        $this->response->errorBadRequest();
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

    public function beforeStore(Request $request, Model $model)
    {
        $url = $model->url;
        if ($this->endsWith($url, '/')) {
            $model->url = substr($url, 0, -1);
        }
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