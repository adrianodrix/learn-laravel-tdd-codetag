<?php

namespace CodePress\CodeTag\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = "codepress_tags";

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
        'unique' => true
    );

    protected $fillable = array(
        'name',
        'slug',
    );

    public function taggable()
    {
        return $this->morphTo();
    }
}