<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

trait SyncTags
{
    /**
     * @param array $tags
     * @param Model $model
     * @return void
     */

    protected function syncTags(array $tags, Model $model): void
    {
        $tags = collect($tags)->map(
            fn(string $tag_name) => Tag::query()->firstOrCreate(['name' => $tag_name])->id
        );


        $model->tags()->sync($tags);
    }
}
