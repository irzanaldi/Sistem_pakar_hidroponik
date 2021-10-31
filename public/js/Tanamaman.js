$(document).ready(function(){    
    $("#tanamanForm").submit(function(event){
        submitForm();
        return false;
    });
});
// function to handle form submit
function submitForm(){
     $.ajax({
        type: "POST",
        url: "{{ route('tanaman.store') }}",
        cache:false,
        data: $('form#tanamanForm').serialize(),
        success: function(response){
            $("#tanaman").html(response)
            $("#tanaman-modal").modal('hide');
        },
        error: function(){
            alert("Error");
        }
    });
}


