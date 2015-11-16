<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 03/11/2015
 * Time: 7:03 PM
 */

namespace Larabook\Statuses;


use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{
    public function timeSincePublished()
    {
        $date = $this->created_at;

        return $date->diffForHumans();
    }
}