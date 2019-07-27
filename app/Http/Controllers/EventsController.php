<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Sport;
use App\Models\League;
use App\Models\Competition;
use App\Models\Team;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Models\Prediction;
use App\Models\EventPrediction;

class EventsController extends Controller
{

    public function view()
    {
        $sports = Sport::orderBy('id', 'desc')->paginate(20);
        return view('admin.events.view', [
            'sports' => $sports,
        ]);
    }

    public function league($sport_id)
    {
        $sport = (new Sport())->sport_exists($sport_id);
        if (is_null($sport)) {
            return back();
        }
        $league = League::where('sport_id', $sport_id)->orderBy('id', 'desc')->get();
        return view('admin.events.league', [
            'leagues' => $league,
            'sport_name' => $sport->name,
            'sport_id' => $sport->id,
        ]);
    }

    public function createView($id)
    {
        try {
            $league = League::findorfail($id);
            $events = Event::where('league_id', $id)->orderBy('event_schedule', 'desc')->paginate(10);

            return view('admin.events.create-view', [
                'league' => $league,
                'events' => $events,
                'sport_id' => $league->sport_id
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e);
        }
    }

    public function getTeams($league_id)
    {
        $teams = League::where('id', $league_id)->first()->teams;
        return response()->json([
            'teams' => $teams
        ]);
    }

    public function createEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teamB_id' => 'required',
            'teamA_id' => 'required',
            'league_id' => 'required',
            'sport_id' => 'required',
            'event_schedule' => 'required',
            'event_ending' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
        $time = $request->event_schedule;
        $time = date('Y-m-d H:i:s ', strtotime("$time"));

        $time_end = $request->event_ending;
        $time_end = date('Y-m-d H:i:s ', strtotime("$time_end"));

        $event = Event::create([
            'teamA_id' => $request->teamA_id,
            'teamB_id' => $request->teamB_id,
            'league_id' => $request->league_id,
            'sport_id' => $request->sport_id,
            'event_schedule' => $time,
            'event_ending' => $time_end
        ]);

        $predictions = Prediction::where('sport_id', $request->sport_id)->orderBy('id', 'desc')->get();

        foreach($predictions as $prediction){
            EventPrediction::create([
                'event_id' => $event->id,
                'prediction_id' => $prediction->id,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'created Successfully',
        ]);
    }

    public function deleteEvent($id)
    {
        try {
            (new Event())->findorfail($id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An Error must have occurred try again',
            ]);
        }
    }

    public function viewEventPage($id)
    {
        try {
            $event = Event::findorfail($id);
            $league = $event->league;
            $sport = $event->league->sport;
            $sport_id = $sport->id;
            $event_prediction = EventPrediction::where('event_id', $event->id)->with('prediction')->get();
            $predictions = Prediction::where('sport_id', $sport_id)->get();
            return view('admin.events.event-page', [
                'event' => $event,
                'league' => $league,
                'sport' => $sport,
                'predictions' => $predictions,
                'event_prediction' => $event_prediction
            ]);
        } catch (\Exception $e) {
            return back();
        }
    }

    public function eventPrediction($event_id)
    {
        return $event_prediction = EventPrediction::where('event_id', $event_id)->with('prediction')->orderBy('id', 'desc')->get();
    }

    public function addPrediction(Request $request)
    {
        try {
            $event_prediction = (new EventPrediction())->eventPredictionExist($request->event_id, $request->prediction_id);
            if ($event_prediction) {
                return response()->json([
                    'status' => false,
                    'message' => 'already Added',
                ]);
            }
            EventPrediction::create([
                'event_id' => $request->event_id,
                'prediction_id' => $request->prediction_id,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Added successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An Error must have occurred try again',
            ]);
        }
    }

    public function deletePrediction(Request $request)
    {
        try {
            $event_prediction = (new EventPrediction())->eventPredictionExist($request->event_id, $request->prediction_id);
            if (!$event_prediction) {
                throw new \Exception();
            }
            $event_prediction->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An Error must have occurred try again',
            ]);
        }
    }

    public function rate(Request $request)
    {
        try {
            $event = EventPrediction::findorfail($request->id);
            $event->update([
                'rating' => $request->name
            ]);
            return response()->json([
                'status' => true,
                'rate' => $request->name,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'An Error must have occurred'
            ]);
        }
    }
}
