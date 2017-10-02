<?php

namespace App\Transformers;

use App\Report;
use League\Fractal\TransformerAbstract;

class ReportTransformer extends TransformerAbstract
{
    public function transform(Report $model)
    {
        return [
            'id' => (int)$model->id,
            'url' => (string)$model->url,
        ];
    }
}