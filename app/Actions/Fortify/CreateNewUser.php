<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\User_type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required'],
            'first_name' => ['required'],
            'middle_initial' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'office_id'=> ['required'],
            'status_id' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        $user_type = User_type::find(2);
        return User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'first_name' => $input['first_name'],
            'middle_initial' => $input['middle_initial'],
            'email' => $input['email'],
            'office_id'=> $input['office_id'],
            'status_id' => $input['status_id'],
            'user_type_id' => $user_type->id,
            'password' => Hash::make($input['password']),
        ]);
    }
}
