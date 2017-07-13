<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BettingCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "home_team_id"=>"required|max:50|",
            "away_team_id"=>"required",
            "bet_home"=>"required",
            "bet_draw"=>"required",
            "bet_away"=>"required",
            "time_start_match"=>"required",
            "time_end_match"=>"required"
        ];
    }
}
