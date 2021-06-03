<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Topic
 *
 * @package App
 * @property string $title
 */
class TopicsUser extends Model
{
    use SoftDeletes;

    protected $fillable = ['semester', 'topic_id', 'user_id'];

    public static function boot()
    {
        parent::boot();

        Topic::observe(new \App\Observers\UserActionsObserver);
    }
}
