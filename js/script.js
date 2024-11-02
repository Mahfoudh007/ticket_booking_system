$(document).ready(function () {

    //Handle form submission
    $('#orderForm').submit(function (event) { 
        event.preventDefault(); // Prevent form from submitting

        // Get form data
        var eventID = $('#eventID').val();
        var eventDate = $('#eventDate').val();
        var adultQuantity = $('#adultQuantity').val();
        var childQuantity = $('#childQuantity').val();

        // AJAX request to add order 
        $.ajax({
            url: './api.php',
            type: 'POST',
            data: {
                eventID: eventID,
                eventDate: eventDate,
                adultQuantity: adultQuantity,
                childQuantity: childQuantity
            },
            sucess: function (response) { 
                alert(response.message);
            },
            error: function (xhr) {
                alert('An Error occured: '+ xhr.responseJSON.error);
            }
        });
    });

});