<?php

namespace App\Rules;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class CurrentPasswordRule implements Rule
{

    protected $pwd;
    protected $hashedPwd;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pwd, $hashedPwd)
    {
        $this->pwd = $pwd;
        $this->hashedPwd = $hashedPwd;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($this->pwd, $this->hashedPwd);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('passwords.failed');
    }
}
