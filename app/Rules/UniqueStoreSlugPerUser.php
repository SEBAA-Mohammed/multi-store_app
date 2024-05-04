<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueStoreSlugPerUser implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct(protected User $user)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (User::find($this->user->id)->stores()->where('slug', $value)->exists()) {
            $fail('The :attribute must be unique for the current user.');
        }
    }
}
