<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 10/7/15
 * Time: 9:16 AM
 */

namespace Larabook\Core;

use App;


/**
 * Class CommandBus
 * @package Larabook\Core
 */
trait CommandBus
{
    /**
     * @param $command
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * @return mixed
     */
    public function getCommandBus ()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }


}