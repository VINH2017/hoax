<?php

namespace App\Http\Controllers;


use App\Flag;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\Model;

class FlagController extends Resource
{
    use Helpers;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('jwt.auth', ['only' => ['store', 'update', 'destroy']]);
    }

    /**
     * Eloquent model.
     *
     * @return Model
     */
    protected function model(): Model
    {
        return new Flag();
    }
}