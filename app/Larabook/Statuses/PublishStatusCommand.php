<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 02/11/2015
 * Time: 7:13 PM
 */

namespace Larabook\Statuses;


class PublishStatusCommand
{
    public $body;
    public $userId;

    public function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }
}