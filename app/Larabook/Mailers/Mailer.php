<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 16/11/2015
 * Time: 6:49 PM
 */

namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as Mail;

/**
 * Class Mailer
 * @package Larabook\Mailers
 */
abstract class Mailer
{

    /**
     * @var Mail
     */
    private $mail;
    /**
     * Mailer constructor.
     */
    public function __construct(Mail $mail )
    {
        $this->mail = $mail;
    }

    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param $data
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        $this->mail->queue($view, $data, function($message) use($user, $subject) {
            $message->to($user->email)->subject($subject);
        });
    }

}