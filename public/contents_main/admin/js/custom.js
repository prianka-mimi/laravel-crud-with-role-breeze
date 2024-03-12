// alart success error part start
setTimeout(function() {
    $('.alert-success').slideUp(1000);
},5000);

setTimeout(function() {
    $('.alert-danger').slideUp(1000);
},10000);
// alart success error part end





// modal id number show , soft-delete , restore , delete part start
$(document).ready(function(){
    $(document).on('click','#softDelete', function(){
        var softDeleteID = $(this).data('id');
        $('.modal_body #modal_id').val(softDeleteID);
    });

    $(document).on('click','#restore', function(){
        var restoreID = $(this).data('id');
        $('.modal_body #modal_id').val(restoreID);
    });

    $(document).on('click','#delete', function(){
        var deleteID = $(this).data('id');
        $('.modal_body #modal_id').val(deleteID);
    });
});
// modal id number show , soft-delete , restore , delete part end





// password show hide part start

function myFunction() {
    // var showPass = document.getElementById("myInput");
    var showPass = document.querySelector(".prianka");
    if (showPass.type === "password") {
        showPass.type = "text";
    } else {
        showPass.type = "password";
    }


    var showPass = document.getElementById("myInput2");
    if (showPass.type === "password") {
        showPass.type = "text";
    } else {
        showPass.type = "password";
    }
  }
// password show hide part end


