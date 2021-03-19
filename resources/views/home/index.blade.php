@extends('layouts.base')

@section('title', 'Home Page')

@section('section')

    <h1>To Do application</h1>
    
    <div class="todo-container">

            <input type="text" name="" id="new-todo">
            <button id="add">Add New Todo</button>
            
        <div class="todo-list">
            @foreach ($todos as $todo)
            <p class="todo" id="{{$todo->id}}"> {{$todo->todo_item}} <button class="del">delete</button></p>
            @endforeach
        </div>
       
        <div class="error-list">

        </div>
            
            
    </div>


    
@endsection