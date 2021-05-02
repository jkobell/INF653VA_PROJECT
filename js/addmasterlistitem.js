$(document).ready(function() {
    $('.save').click(function(event) {
        
        var itemvalue = $('.addmasteriteminput').val();

        if (itemvalue.length > 0)
        {
            var formData = {
                insert_action: 'insertmasterlistitem',                       
                item: itemvalue
            };
    
            $.ajax({
                type: "POST",
                url: "../models/userlistitem.php",
                data: formData,
                dataType: "json",
                encode: true,
                }).done(function (response) {
                alert(response);
                }).fail(function (response) {
                    event.preventDefault();
                    //alert('Save Failed!');
                });
        }
    });
});