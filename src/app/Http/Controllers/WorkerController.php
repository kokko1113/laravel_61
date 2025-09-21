<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Worker::get();
        return view("worker.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("worker.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("aa");
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
            "memo"=>"required",
        ],[
            "name.required"=>"エラーが発生しました",
            "password.required"=>"エラーが発生しました",
            "email.required"=>"エラーが発生しました",
            "memo.required"=>"エラーが発生しました",
        ]);

        Worker::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "memo"=>$request->memo,
        ]);

        return redirect(route("worker.create"))->with(["message"=>"人材情報が登録されました"]);
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
        $item=Worker::find($id);
        $item->delete();
        return redirect(route("worker.index"));
    }
}
