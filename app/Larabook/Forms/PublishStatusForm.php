<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 03/11/2015
 * Time: 10:19 AM
 */

namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator
{
    protected $rules = [
        'body' => 'required'
    ];
}