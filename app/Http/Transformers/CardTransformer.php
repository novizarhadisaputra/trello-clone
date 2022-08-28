<?php

namespace App\Http\Transformers;

use stdClass;

class CardTransformer
{
    public function detail($model)
    {
        $tmp = $this->item($model);
        return (new ResponseTransformer)->json(200, 'Ok', $tmp);
    }

    public function all($models)
    {
        $data = [];
        foreach ($models as $model) {
            $data[] = $this->item($model);
        }
        return (new ResponseTransformer)->json(200, 'Ok', $data, $models);
    }

    public function item($model)
    {
        $tmp = new stdClass;
        $tmp->id = $model->id;

        return $tmp;
    }
}
