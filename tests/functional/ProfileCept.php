<?php


$I = new FunctionalTester($scenario);

$I->am("A larabook member");

$I->wantTo('I want to view my profile');

$I->signIn();
$I->postAStatus('My New status');

$I->click('My Profile');
$I->seeCurrentUrlEquals('/@Foobar');

$I->see('My New status');