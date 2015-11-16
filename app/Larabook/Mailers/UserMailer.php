<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 16/11/2015
 * Time: 6:56 PM
 */

namespace Larabook\Mailers;

use Larabook\Users\User;


class UserMailer extends Mailer
{
    public function sendWelcomeMessageTo(User $user)
    {
        $subject = "Welcome to Larabook";
        $view = 'emails.registration.confirm';

        return $this->sendTo($user, $subject, $view);
    }
}