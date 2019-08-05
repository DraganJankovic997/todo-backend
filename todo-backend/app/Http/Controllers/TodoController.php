<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo as Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todos = Todo::all();
        $id = $request->user()->id;
        $filter = [];
        foreach($todos as $t){
            if($t->user_id == $id) {
                array_push($filter, $t);
            }
        }

        unset($t);
        return $filter;
    }

    public function show(Request $request, $id){
        $t = Todo::findOrFail($id);
        if($request->user()->id == $t->user_id) {
            return Todo::findOrFail($id);
        } else {
            return "Nada";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTodo = new Todo;
        $newTodo->do = $request->do;
        $newTodo->untill_date = $request->untill_date;
        $newTodo->untill_time = $request->untill_time;
        $newTodo->user_id = $request->user()->id;
        $newTodo->done = false;

        $newTodo->save();

        return $newTodo;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newTodo = Todo::find($id);
        if($newTodo->user_id == $request->user()->id) {
            $newTodo->do = $request->input('do');
            $newTodo->untill_date = $request->input('untill_date');
            $newTodo->untill_time = $request->input('untill_time');
            $newTodo->done = $request->input('done');

            $newTodo->save();
            return $newTodo;
        } else {
            return "Nada";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $todoDelete = Todo::findOrFail($id);
        if($todoDelete->user_id == $request->user()->id){
            $todoDelete->delete();
            return "Delete successfull";
        } else {
            return "Nada";
        }

    }
}
