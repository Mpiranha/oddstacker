<?php
namespace App\Http\Helpers;

use App\Models\Sport;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamsHelper {
    public static function createTeam($data){
        try{
            $team = new Team($data);
            $team->save();

            $update_sport_team_count = Sport::where('id', $team->sport_id)->lockForUpdate()->first();
            $update_sport_team_count->count_teams = $update_sport_team_count->count_teams + 1;
            $update_sport_team_count->save();

            return [
                'status' => true,
                'team' => $team
            ];
        }catch(\Exception $exc){
            dd($exc);
            return [
                'status' => false
            ];
        }
    }
}