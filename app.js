// const name = document.getElementById("name").value js
// const name = $("name").val() jquery
// syntax JQ
// $(document).ready(function(){
    
// })
$(document).ready(function(){
    // call funciton loaduser
    loadUser()

    //create function save data 
    $("#save").click(function(){
        // validation data
        const id  = $("#id").val()
        const name = $("#name").val()
        const gender = $("#gender").val()
        const address = $("#address").val()
        const phone = $("#phone").val()
        // console.log(name)
        // console.log(gender)
        // console.log(address)
        // console.log(phone)
        //check validation
        if(!name || !address){
            return alert("name and address required")
        }

        //condition dynamic url = id ? "update" : "create"

        let url = id ? "update.php" : "create.php"

        $.ajax({
            type: "POST",//GET POST PUT PATCH DELETE
            // url: "create.php",
            url : url,
            data: {
                id:id,
           //   key :value
                name:name,
                gender:gender,
                address:address,
                phone:phone
            },
            success: function (response) {
                alert(response)
                $("#exampleModal").modal("hide") // bootstrap 5
                loadUser()
            }
        });
    })

    // function loadUser
    function loadUser(){
        $.ajax({
            type: "GET",
            url: "fetch.php",
            success: function (response) {
                $("#TableUser").html(response)
            }
        });
    }

    $(document).on("click",".btn-delete",function(){
        let id = $(this).data("id");
        // console.log(id)
        $.ajax({
            type: "GET",
            url: "delete.php",
            data: {
                id:id
            },
            success: function (response) {
                alert(response)
                loadUser()
            }
        });
    })

    $(document).on("click",'.btn-edit',function(){
        $("#exampleModal").modal("show"); //open modal
        $("#exampleModalLabel").text("Edit User");

        $("#save").text("update")

        let id = $(this).data("id");
        let name = $(this).data("name");
        let gender = $(this).data("gender");
        let address = $(this).data("address");
        let phone = $(this).data("phone");
        console.log(name)
        console.log(gender)
        console.log(address)
        console.log(phone)

        $("#id").val(id)
        $("#name").val(name)
        $("#gender").val(gender)
        $("#address").val(address)
        $("#phone").val(phone)

    })

    $("#btnAddUser").click(function(){
        $("#exampleModal").modal("show")
        $("#exampleModalLabel").text("Add User")
        $("#save").text("Create User")

        $("#id").val("")
        $("#name").val("")
        $("#gender").val("")
        $("#address").val("")
        $("#phone").val("")

    })

})
