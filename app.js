// const name = document.getElementById("name").value js
// const name = $("name").val() jquery
// syntax JQ
// $(document).ready(function(){
    
// })
$(document).ready(function(){

    //create function save data 
    $("#save").click(function(){
        // validation data
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
        $.ajax({
            type: "POST",//GET POST PUT PATCH DELETE
            url: "create.php",
            data: {
           //   key :value
                name:name,
                gender:gender,
                address:address,
                phone:phone
            },
            success: function (response) {
                alert(response)
            }
        });
     })



})