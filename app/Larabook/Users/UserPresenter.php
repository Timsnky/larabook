<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 03/11/2015
 * Time: 12:53 PM
 */

namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }

    public function followerCount()
    {
        $count = $this->entity->followers()->count();

        $plural = str_plural('Follower', $count);

        return "{$count} {$plural}";

    }

    public function statusCount()
    {
        $count = $this->entity->statuses->count();

        $plural = str_plural('Status', $count);

        return "{$count} {$plural}";
    }
}