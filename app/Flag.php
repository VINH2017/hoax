<?php

namespace App;


use App\Transformers\FlagTransformer;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class Flag extends Model
{
    protected $fillable = [
        'url',
        'flagged',
    ];

    public $validation = [
        'flagged_by' => ['required'],
        'url' => ['required'],
    ];

    /**
     * Get the transformer for the model.
     *
     * @return TransformerAbstract
     */
    function transformer(): TransformerAbstract
    {
        return new FlagTransformer();
    }
}