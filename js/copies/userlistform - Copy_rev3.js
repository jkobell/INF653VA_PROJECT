  $(document).ready(function() {
    
    setgotitstate();

    $('.gotit').click(function(event) {
        
        var gotitvalue = $('.gotitfrm').val();
        gotitvalue = togglebool(gotitvalue);
        
        $('.updatecheckedonlist').val("true");

        var formData = {
            updatecheckedonlist: $('.updatecheckedonlist').val(),
            checked_on_list: gotitvalue,
            userListItemId: $('.useritemid').val()
        };
                
         $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            //console.log(response);
            togglegotit();
            alert(response);
            }).fail(function (response) {
                console.log(response);
                alert('Got It! Update Failed!');
            });

        event.preventDefault(); 
    });
    
    //toggle bool
    function togglebool(value)
    {        
        value > 0 ? value = 0 : value = 1;
        return value; 
    }

    function togglegotit()
    {
        var togglevalue = $('.gotitfrm').val();
        togglevalue = togglebool(togglevalue);
        //togglevalue > 0 ? togglevalue = 0 : togglevalue = 1;
        $('.gotitfrm').val(togglevalue);

        if (togglevalue > 0)
        {
            $('.gotit').val('Got It!');
            $('.gotit').css('background-color', 'lightgreen'); 
        }
        else
        {
            $('.gotit').val('Not Yet');
            $('.gotit').css('background-color', 'lightyellow');  
        }        
    }

    function setgotitstate()
    {
      if ($('.gotitfrm').val() > 0)
      {
        $('.gotit').val('Got It!');
        $('.gotit').css('background-color', 'lightgreen'); 
      }
      else
      {
        $('.gotit').val('Not Yet');
        $('.gotit').css('background-color', 'lightyellow');
      }  
    }

    /* $('.edit').click(function(event)
    {
        $("input[name='item']").removeAttr("readonly");
        event.preventDefault();  
    }); */

    $('.editformquantity').click(function(event)
    {        

        $("input[name='quantity']").removeAttr("readonly");
        $('.savedelete').val("Save").addClass('save');
        
        event.preventDefault();        
    });

    $('.editformquantity').focusout(function()
    {
        $("input[name='quantity']").attr("readonly", true);
        $('.savedelete').val("Delete").addClass('delete');
        
        var formData = {
            /* updatecheckedonlist: $('.updatecheckedonlist').val(),*/
            method: 'getQuantity',
            userListItemId: $('.useritemid').val()
        };
                
         $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            $('.editformquantity').val(response['quantity']);
            //alert(response['quantity']);
            alert('Quantity Reset Success!');
            }).fail(function (response) {
                console.log(response);
                alert('Quantity Reset Failed!');
            });         

        //alert('focus out hit');
    });

    $('.editformcategory').click(function(event)
    {        

        $("input[name='categoryName']").removeAttr("readonly");
        $('.savedelete').val("Save").addClass('save');

        var formData = {            
            method: 'getAllCategories'            
        };
                
         $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            //$('.editformquantity').val(response['quantity']);
            //alert(response['quantity']);
            alert(response.length);
            alert('getAllCategories Success!');
            }).fail(function (response) {
                
                alert('getAllCategories Failed!');
            }); 
        
        event.preventDefault();        
    });




    $('.editformstore').click(function(event)
    {        

        $("input[name='storeName']").removeAttr("readonly");
        $('.savedelete').val("Save").addClass('save');
        
        event.preventDefault();        
    });




    $('.editformfrequency').click(function(event)
    {        

        $("input[name='frequency']").removeAttr("readonly");
        $('.savedelete').val("Save").addClass('save');
        
        event.preventDefault();        
    });




    $('.save').click(function(event)
    {
        $("input[name='quantity']").attr("readonly", true);
        $('.savelistedit').val("true");

        var formData = {
            savelistedit: $('.savelistedit').val(),            
            userListItemId: $('.useritemid').val(),
            quantity: $('.editformquantity').val(),
            category: $('.editformcategory').val(),
            store: $('.editformstore').val(),
            frequency: $('.editformfrequency').val()
        };

        $.ajax({
            type: "POST",
            url: "../models/userlistitem.php",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (response) {
            //console.log(data);
            alert(response);
            }).fail(function (response) {
                //console.log(data);
                alert('Update Failed!');
            });


        $('.savedelete').val("Delete").addClass('deleteitem');

        event.preventDefault();      
        
    });



    /* $('button').on('click', function() {
            if ($(this).hasClass('save')) {
                alert("Saved!!!");
                $(this).text("Edit").removeClass('save');
                $('.listeditem').attr('readonly', 'true').css({
                'border': 'none',
                'outline': 'none'
                });
            } else {
                $(this).text("Save").addClass('save');
                $('.listeditem').attr('readonly', 'false').css({
                'border': 'blue solid 1px',
                'outline': 'none'
                }).focus();
            }
    }); */
});
