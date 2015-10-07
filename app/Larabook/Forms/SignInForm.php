<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 10/7/15
 * Time: 2:25 PM
 */

namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator
{
    protected $rules = [
      'email' => 'required',
        'password' => 'required'
    ];
}