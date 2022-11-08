<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Contracts\Validation\DataAwareRule;
use App\Models\Event;


class RangeConflict implements InvokableRule
{
    protected $user;
    protected $event;

    public function __construct($user_id, $event_id)
    {
        $this->user = $user_id;
        $this->event = $event_id;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $count = Event::whereRaw('? between start_date and end_date and user_id = ? and id <> ?', array($value, $this->user, $this->event))->count();
        if ($count > 0) {
            $fail('The :attribute has conflicts with other event.');
        }
    }
}
