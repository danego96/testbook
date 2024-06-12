<?php

namespace App\Actions\Fortify;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
     public function create(array $input): Student
    {
        Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'birth_date' => 'required',
            'group_id' => 'required',
            'password' => ['required', 'confirmed'],

        ])->validate();

        $imagePath = null;

        if (isset($input['image'])) {
            $imagePath = $input['image']->store('images', 'public');
        }

        return Student::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'birth_date' => $input['birth_date'],
            'group_id' => $input['group_id'],
            'image' => $imagePath,
        ]);
    }
}
