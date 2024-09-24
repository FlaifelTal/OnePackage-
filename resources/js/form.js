
$(document).ready(function () {
    // var apiUrl = $("#config").data("api-url");
 // Get the CSRF token from the meta tag
 var csrfToken = $('meta[name="csrf-token"]').attr('content');

 // Add the CSRF token to the AJAX request headers
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': csrfToken
     }
 });
    $("#submissionForm").on("submit", function (event) {
        event.preventDefault(); 

        $(".error").empty(); // Empties all child elements inside elements with class 'error'
        $("#responseMessage").empty(); // Empties content inside element with ID 'responseMessage'

        var apiUrl= $(this).attr('action');    //get the action from the form itselfffff edit 

        console.log(apiUrl,this);

        var formData = new FormData(this); // Create FormData object

        // var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: apiUrl, 
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Prevent jQuery from setting the content type
            dataType: "json", // Expecting JSON response
            success: function (response) {
                if (response.status) {
                    $("#responseMessage").text(response.message).css("color", "green");
                } else {
                    $("#responseMessage").text(response.message).css("color", "red");
                    for (var field in response.errors) {
                        $("#" + field + "Error").text(response.errors[field]);
                    }
                }
            },
            error: function (xhr, status, error) {
                $("#responseMessage")
                    .text("An error occurred: " + error)
                    .css("color", "red");
                console.log("Error details:", xhr, status, error); // Log error details for debugging
            }
        });
    });
});
