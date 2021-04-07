@extends('layouts.base')

@section('title', 'Home Page')

@section('section')

    <div class="todo-container">
         <h1>To Do application</h1>
            <input type="text" name="" id="new-todo">
            <button id="add">Add New Todo</button>
            
            <div style="padding:10px; to"><h2 style="font-weight:bolder">ToDo List</h2><hr><hr></div>
        <div class="todo-list">
            @foreach ($todos as $todo)
            <p class="todo" id="{{$todo->id}}"> {{$todo->todo_item}} </p>
            <button class='del'>Delete</button> 
            <button class='mark'>Mark as completed</button><hr>
            @endforeach

        </div>
       
        <div class="error-list">

        </div>
            
    </div>


    
@endsection