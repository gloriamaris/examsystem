<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 *
 * @package App
 * @property string $description
*/
class Announcement extends Model
{
    use SoftDeletes;

    protected $fillable = ['description', 'user_id'];

    public static function boot()
    {
        parent::boot();

        Topic::observe(new \App\Observers\UserActionsObserver);
    }
}
