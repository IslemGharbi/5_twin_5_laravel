<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoBadWordsRule implements Rule
{
    public function passes($attribute, $value)
    {
        // List of bad words to check against
        $badWords = ['fuck', 'damn', 'shit'];

        foreach ($badWords as $badWord) {
            if (stripos($value, $badWord) !== false) {
                return false; // Found a bad word
            }
        }

        return true; // No bad words found
    }

    public function message()
    {
        return 'The message contains inappropriate words.';
    }
}
