<?php

namespace Giuga\LaravelSeoMetaBox\Traits;

use Giuga\LaravelSeoMetaBox\Models\Seo;
use Illuminate\Database\Eloquent\Model;

trait HasSeo
{
    abstract public function getSeoOptions(): SeoOptions;

    protected static function bootHasSeo()
    {
        static::saved(function (Model $model) {
            $options = $model->getSeoOptions();
            $seo = Seo::firstOrNew([
                'type' => get_class($model),
                'object_id' => $model->id,
            ]);
            $seo->slug = $options->routePrefix ?? '';
            if ($options->hasSlug) {
                $seo->slug .= $model->{$options->slugField};
            }
            $seo->save();
        });
    }

    public function seo()
    {
        return $this->hasOne(Seo::class, 'object_id');
    }
}