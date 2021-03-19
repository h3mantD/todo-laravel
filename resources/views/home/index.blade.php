@extends('layouts.base')

@section('title', 'Home Page')

@section('section')

    <div class="todo-container">
         <h1>To Do application</h1>
            <input type="text" name="" id="new-todo">
            <button id="add">Add New Todo</button>
            
        <div class="todo-list">
            @foreach ($todos as $todo)
            <p class="todo" id="{{$todo->id}}"> {{$todo->todo_item}} </p><button class='del'>Delete</button> <hr>
            @endforeach
        </div>
       
        <div class="error-list">

        </div>
            
            
    </div>


    
@endsection