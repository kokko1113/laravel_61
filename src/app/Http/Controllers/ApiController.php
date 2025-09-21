<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Event;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getEvent(Request $request)
    {
        $worker_id = $request->worker_id;
        if (!$worker_id) {
            return response()->json(["error" => "エラー"], 404);
        }
        $date = $request->date;
        $place = $request->place;
        $title = $request->title;
        $result = [];
        $events = [];
        $dispatchs = Dispatch::where("worker_id", $worker_id)->get();
        foreach ($dispatchs as $item) {
            $events[] = Event::find($item->event_id);
        }
        foreach ($events as $event) {
            $query = Event::query();
            if ($date) {
                $query->where("date", "=", $date);
            }
            if ($place) {
                $query->where("place", "=", $place);
            }
            if ($title) {
                $query->where("name", "LIKE", "%" . $title . "%");
            }
            $item = $query->find($event->id);
            if ($item) {
                $result[] = $event;
            }
        }
        return response()->json($result, 200);
    }

    public function postDispatch(Request $request)
    {
        $event_id = $request->event_id;
        $worker_id = $request->worker_id;
        if (!$worker_id || !$event_id) {
            return response()->json(["error" => "エラー"], 404);
        }
        $dispatchs = Dispatch::where("worker_id", $worker_id)->where("event_id", $event_id)->get();
        foreach ($dispatchs as $item) {
            if ($item) {
                $item->update([
                    "permit" => true,
                ]);
            }else{
                return response()->json(["error" => "dispatchは存在しません"], 404);
            }
        }
        return response()->json("", 204);
    }
}
