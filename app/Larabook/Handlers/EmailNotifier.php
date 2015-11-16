<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 16/11/2015
 * Time: 6:47 PM
 */

namespace Larabook\Handlers;
use Larabook\Mailers\UserMailer;
use Laracasts\Commander\Events\EventListener;
use Larabook\Registration\Events\UserHasRegistered;

class EmailNotifier extends EventListener
{
    private $mailer;

    /**
     * EmailNotifier constructor.
     * @param $mailer
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }

}