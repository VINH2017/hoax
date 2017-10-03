<?php

namespace App\Transformers;

use App\Flag;
use League\Fractal\TransformerAbstract;

class FlagTransformer extends TransformerAbstract
{
    public function transform(Flag $model)
    {
        return [
            'id' => (int)$model->id,
            'url' => (string)$model->url,
            'flagged' => (boolean)$model->flagged,
        ];
    }
}