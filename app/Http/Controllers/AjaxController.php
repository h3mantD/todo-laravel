<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use ErrorException;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
     public function index() {
        return view('home.index', ['todos' => TodoList::orderBy('id', 'DESC')->get()]);
    }

    public function todoGet(Request $request) {
        $valid = true;
        $todo = TodoList::where('todo_item','=', $request['newtodo'])->get();
        try {
            if($todo[0]->id != null) {
                $valid = false;
                return response()->json(['code'=>205, 'status'=>$valid],200);
            }
        }
        catch (ErrorException $e) {
            return response()->json(['code'=>200, 'status'=>$valid],200);
        }
        
        
    }

    public function indexPost(Request $request) {
        
        $todoObj = new TodoList();
        $todoObj->todo_item = $request['newtodo'];
        $todoObj->save();

        $todo = TodoList::where('todo_item','=', $request['newtodo'])->get();

        return response()->json(['code'=>200, 'message'=>'To Do Created successfully','data' => $request['newtodo'], 'id' => $todo[0]->id], 200);
    }

    public function todoDelete(Request $request) {
        
        $todo = TodoList::find($request['delid']);
        if($todo != null) {
            $todo->delete();
            return response()->json(['code'=>200, 'message'=>'Todo item deleted successfully',], 200);
    
        }
        else {
            
        }

    }
}