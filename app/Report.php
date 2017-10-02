<?php

namespace App;


use App\Transformers\ReportTransformer;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'reason',
    ];

    public $validation = [
        'url' => ['required'],
        'reason' => ['required'],
    ];

    /**
     * Get the transformer for the model.
     *
     * @return TransformerAbstract
     */
    function transformer(): TransformerAbstract
    {
        return new ReportTransformer();
    }
}