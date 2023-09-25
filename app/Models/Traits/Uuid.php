<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                if (empty($model->{$model->getKeyName()})) {
                    $model->{$model->getKeyName()} = (string) Str::uuid(); // generate uuid
                }
                // Change id with your primary key
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
