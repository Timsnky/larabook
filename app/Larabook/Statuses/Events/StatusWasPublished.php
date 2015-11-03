<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 02/11/2015
 * Time: 7:27 PM
 */

namespace Larabook\Statuses\Events;
use Larabook\Statuses\Status;

class StatusWasPublished
{
    public $status;

    /**
     * StatusWasPublished constructor.
     * @param $status
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }
}