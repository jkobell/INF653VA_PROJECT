$(document).ready(function() {

    $('.additeminput').focus();
    $('.additeminput').val('');

    $('.addsearchitemswrapper').on('click', '.search', function(event) {

        var addtoelementclass = '.additemcontainer';        

        var formclass = 'additemselect';

        var elementidvalue = 'additemselect';

        var arrkey = 'item';

        var itemvalue = $('.additeminput').val(); 

        var formData = {            
            get_action: 'searchitems',
            item: itemvalue 
        };
                
        $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            
            if (response.length > 0)
            {
                $('.additemtext').remove();       

                adddropdown(addtoelementclass, formclass, elementidvalue, response, arrkey);

                $('#addsearchitems').val("Save");       
                $('#addsearchitems').toggleClass('search', false);
                $('#addsearchitems').toggleClass('save', true);  
            }
            
            //response['item']
            
            //alert(response);
            }).fail(function (response) {
                console.log(response);
                alert('Search Failed!');
            });

        event.preventDefault(); 
    });

    function adddropdown(addtoelementclass, formclass, elementidvalue, arr, arrkey)
    {       
         var addselectelem = 
        '<select class="form-control '+formclass+'" id="'+elementidvalue+'" style="text-align: center;">';

        var closeselect = '</select>';

        var selectelement = "";

        $.each(arr, function(i, val)
        {  
            var str = '<option value="'+val[arrkey]+'">'+val[arrkey]+'</option>';

            var strselected = '<option value="'+val[arrkey]+'" selected>'+val[arrkey]+'</option>';

            selectelement += i < 1 ? strselected : str;
        });
        addselectelem += selectelement;
        addselectelem += closeselect;
       
        $(addtoelementclass).html(addselectelem);
         
        return;
    }

    $('.addsearchitemswrapper').on('click', '.save', function(event) {

        var itemvalue = $('.additemselect').val();
        var categoryvalue = $('.addcategoryselect').val();
        var storevalue = $('.addstoreselect').val();
        var frequencyvalue = $('.addfrequencyselect').val();

        var formData = {
            insert_action: 'insertuserlistitem',                       
            item: itemvalue,
            categoryName: categoryvalue,
            storeName: storevalue,
            frequency: frequencyvalue
        };

        $.ajax({
            type: "POST",
            url: "../models/userlistitem.php",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (response) {
                //alert(response);
            //alert('user list item save successful');
            }).fail(function (response) {
                event.preventDefault();
                //alert('Save Failed!');
            });        
    });

    

    $('.addresetbutton').click(function(event) {
        location.reload();        
    });
        

});