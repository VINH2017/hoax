<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;
use ReportTransformer;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
    ];

    public $validation = [
        'url' => ['required'],
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