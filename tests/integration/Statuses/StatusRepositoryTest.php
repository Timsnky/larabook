<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

    protected function _after()
    {
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'My Status'
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'His Status'
        ]);

        $statusesForUser = $this->repo->getAllForUser($users[0]);

        $this->assertCount(2, $statusesForUser);
    }

    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        $status = TestDummy::create('Larabook\Statuses\Status', [
            'user_id' => null,
            'body' => 'My Status'
        ]);

        $user = TestDummy::create('Larabook\Users\User');

        $savedStatus = $this->repo->save($status, $user->id);

        $this->tester->seeRecord('statuses', [
            'body' => 'My Status'
        ]);

        $this->assertEquals($user->id, $savedStatus->user_id);
    }

}