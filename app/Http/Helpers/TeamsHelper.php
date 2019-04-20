<?php
namespace App\Http\Helpers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamsHelper {
    public static function createTeam($data){
        try{
            $team = new Team($data);
            $team->save();

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