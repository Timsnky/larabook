<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 29/10/2015
 * Time: 9:14 PM
 */

namespace Larabook\Statuses;

use Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Statuses\Events\StatusWasPublished;


class Status extends Eloquent
{
    use EventGenerator;

    protected $fillable = ['body'];

    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($status));

        return $status;
    }

    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }
}