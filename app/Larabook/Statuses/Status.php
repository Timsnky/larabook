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
use Laracasts\Presenter\PresentableTrait;


class Status extends Eloquent
{
    use EventGenerator, PresentableTrait;

    protected $presenter = 'Larabook\Statuses\StatusPresenter';

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

    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }
}