<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Event::get();
        return view("event.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("event.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "place"=>"required",
            "date"=>"required",
        ],[
            "name.required"=>"エラーが発生しました",
            "place.required"=>"エラーが発生しました",
            "date.required"=>"エラーが発生しました",
        ]);

        Event::create([
            "name"=>$request->name,
            "place"=>$request->place,
            "date"=>$request->date,
        ]);

        return redirect(route("event.create"))->with(["message"=>"イベント情報が登録されました"]);
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
        $item=Event::find($id);
        return view("event.edit",compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name"=>"required",
            "place"=>"required",
            "date"=>"required",
        ],[
            "name.required"=>"エラーが発生しました",
            "place.required"=>"エラーが発生しました",
            "date.required"=>"エラーが発生しました",
        ]);

        $item=Event::find($id);
        $item->update([
            "name"=>$request->name,
            "place"=>$request->place,
            "date"=>$request->date,
        ]);

        return redirect(route("event.edit",$id))->with(["message"=>"イベント情報が更新されました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Event::find($id);
        $item->delete();
        return redirect(route("event.index"));
    }
}
