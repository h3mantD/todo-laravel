function delEvent() {  
    $("p.todo").on("click",".del", function () {
        if (confirm("are you sure you want to remove this todo item")) {
            let id = $($(this).parent()).attr("id");
            console.log(id);
            $($(this).parent()).remove();
            $.ajax({
                    type: "DELETE",
                    url: "/home",
                    data: {delid:id},
                    //dataType: "json",
                    success: function (response) {
                        if(response.code == 200) {
                            alert("Todo item deleted");
                        }
                    },
                    error: function (response) {
                        //console.log(response);
                        $(".error-list").append("<p> " +response.responseText+ "</p>");
                    }
                    
                });
        }

    });
}

function addTodo() {
    $.ajax({
        type: "POST",
        url: "/home",
        data: {newtodo:todo},
        //dataType: "json",
        success: function (response) {
            console.log(response);
            if(response.code == 200) {
                alert('added todo');
                $(".todo-list").append("<p class='todo' id='"+response.id+"'> " +response.data+ " <button class='del'>Delete</button> </p> ");
                delEvent();
            }
        },
        error: function (response) {
            //console.log(response);
            $(".error-list").append("<p> " +response.responseText+ "</p>");
        }
        
    });
}

$(document).ready(function () {
    delEvent();
    
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $("#add").on("click", function (e) {
        e.preventDefault();

        let todo = $("#new-todo").val();
        if(todo != 0) {
            var valid = false;
            $.ajax({
                type: "GET",
                url: "/home/get",
                data: {newtodo:todo},
                success: function (response) {
                    console.log(response);
                    if(response.code == 200) {
                        console.log("hiii");
                        
                        $.ajax({
                    type: "POST",
                    url: "/home",
                    data: {newtodo:todo},
                    //dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if(response.code == 200) {
                            alert('added todo');
                            $(".todo-list").append("<p class='todo' id='"+response.id+"'> " +response.data+ " <button class='del'>Delete</button> </p> ");
                            delEvent();
                        }
                    },
                    error: function (response) {
                        //console.log(response);
                        $(".error-list").append("<p> " +response.responseText+ "</p>");
                    }
                    
                });




                    }
                    else {
                        alert("todo already exists")
                    }
                },
                error: function (response) {  
                    console.log(response);
                    $(".error-list").append("<p> " +response.responseText+ "</p>");
                }
            });
            

           
        }
        $("#new-todo").val("");
    });

    

});

