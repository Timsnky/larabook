<?php namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 10/7/15
 * Time: 7:16 AM
 */
class RegistrationForm extends FormValidator {

    protected $rules = [
      'username' => 'required | unique:users',
        'email' => 'required | email | unique:users',
        'password' => 'required | confirmed'
    ];

}