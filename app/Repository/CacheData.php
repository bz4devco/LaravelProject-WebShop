<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;



class CacheData
{
    protected $tableName;


    CONST CACHE_KEY = '';

    protected function getCacheKey($key)
    {

        $key = strtoupper($key);
        return self::CACHE_KEY . '.' . $key; 
    }


    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function all($orderby)
    {
        $key = "all.{$orderby}";
        $casheKey = $this->getCacheKey($key);
        return cache()->remember($casheKey, now()->addMinutes('5'), function () use($orderby) {
            return Model::orderBy($orderby) ->get();
        });
    }

}