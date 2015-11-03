<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 02/11/2015
 * Time: 7:19 PM
 */

namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;

class PublishStatusCommandHandler implements CommandHandler
{
    protected $statusRepository;

    /**
     * PublishStatusCommandHandler constructor.
     * @param $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $this->statusRepository->save($status, $command->userId);
    }
}