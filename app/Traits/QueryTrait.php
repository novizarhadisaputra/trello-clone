<?php

namespace App\Traits;

trait QueryTrait
{
    public function scopeOrder($query, $request)
    {
        $sql = $query;
        $column = $request->input('order_column', 'created_at');
        $position = $request->input('order_position', 'asc');
        $sql = $sql->orderBy($column, $position);
        return $sql;
    }

    public function scopeSearch($query, $request)
    {
        $sql = $query;
        if (isset($request->search) && $request->filled('search')) {
            foreach ($this->fillable as $value) {
                $sql = $sql->orWhere($value, $request->{$value});
            }
        }
        return $sql;
    }
}
