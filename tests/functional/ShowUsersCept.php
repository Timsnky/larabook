<?php 
$I = new FunctionalTester($scenario);
$I->am('A Larabook Member');

$I->wantTo('Review all users who are registered for Larabook');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');