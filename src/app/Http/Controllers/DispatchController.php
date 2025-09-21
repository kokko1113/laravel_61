<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Dispatch::get();
        return view("dispatch.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events=Event::get();
        $workers=Worker::get();
        return view("dispatch.create",compact("events","workers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "event_id"=>"required",
            "worker_id"=>"required",
            "memo"=>"required",
        ],[
            "event_id.required"=>"エラーが発生しました",
            "worker_id.required"=>"エラーが発生しました",
            "memo.required"=>"エラーが発生しました",
        ]);
        foreach ($request->worker_id as $item) {
            Dispatch::create([
                "event_id"=>$request->event_id,
                "worker_id"=>$item,
                "memo"=>$request->memo,
            ]);
        }

        return redirect(route("dispatch.create"))->with(["error"=>"派遣情報が登録されました"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Dispatch::find($id);
        $item->delete();
        return redirect(route("dispatch.index"));
    }
}
