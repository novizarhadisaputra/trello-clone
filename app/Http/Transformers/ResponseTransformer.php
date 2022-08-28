<?php

namespace App\Http\Transformers;

use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class ResponseTransformer
{
    public function json($statusCode, $message, $data = null, $collection = null)
    {
        $result = new stdClass();
        $result->status = $statusCode;
        $result->message = $message;
        $result->data = $data;

        if ($collection != null && $collection instanceof LengthAwarePaginator) {
            $result->paginate = new stdClass;
            $result->paginate->perPage = $collection->perPage();
            $result->paginate->currentPage = $collection->currentPage();
            $result->paginate->lastPage = $collection->lastPage();
            $result->paginate->previousPageUrl = $collection->previousPageUrl();
            $result->paginate->nextPageUrl = $collection->nextPageUrl();
            $result->paginate->total = $collection->total();
        }

        return response()->json($result, $statusCode);
    }
}
