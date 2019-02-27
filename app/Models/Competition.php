<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Team;

class Competition extends Model
{
    public function teams($teamType = null){
        $teams = [];
        if(!empty($this->teams)){
            $teamsIdArray = explode('|', $this->teams);
            foreach($teamsIdArray as $teamId){
                $team = Team::find(trim($teamId));
                array_push($teams, $team);
            }
        }
        return $teams;
    }

    public function sport(){
        return $this->belongsTo('App\Sport');
    }
}
