<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 *
 * @package App
 * @property string $title
 */
class Exam extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status', 'date_start', 'date_end', 'topic_id'];

    public static function boot()
    {
        parent::boot();

        Topic::observe(new \App\Observers\UserActionsObserver);
    }

    public function topic()
    {
        return $this->hasOne(Topic::class, 'topic.id', 'topic_id')->withTrashed();
    }
}
