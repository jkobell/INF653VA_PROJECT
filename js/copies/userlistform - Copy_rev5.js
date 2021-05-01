  $(document).ready(function() {
    
    setgotitstateonload();

    $('.gotitbtn').click(function(event) {
        
        //var obj = event.target.id;
        var userlistitemid = $(this).data('ulid');

        var gotitvalue = $('#checked_on_listulid'+userlistitemid).val();
        gotitvalue = togglebool(gotitvalue);
        
        $('.updatecheckedonlist').val("true");

        var formData = {
            //updatecheckedonlist: $('.updatecheckedonlist').val(),
            update_action: 'updatecheckedonlist',  
            checked_on_list: gotitvalue,
            userListItemId: userlistitemid
        };
                
         $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            //console.log(response);
            togglegotit(userlistitemid);
            //alert(response);
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

    function togglegotit(userlistitemid)
    {
        var togglevalue = $('#checked_on_listulid'+userlistitemid).val();

        togglevalue = togglebool(togglevalue);

        $('#checked_on_listulid'+userlistitemid).val(togglevalue);

        var gotitbuttonulid = '#gotitbuttonulid'+userlistitemid;

        setgotitbutton(togglevalue, gotitbuttonulid);        
    }

    function setgotitstateonload()
    {
        $('.gotitfrm').each(function()
        {
            var userlistitemid = $(this).data('ulid');
            
            var checked_on_listvalue = $('#checked_on_listulid'+userlistitemid).val();

            var gotitbuttonulid = '#gotitbuttonulid'+userlistitemid;

            setgotitbutton(checked_on_listvalue, gotitbuttonulid);            
        });      
    }

    function setgotitbutton(checked_on_listvalue, gotitbuttonulid)
    {
        if (checked_on_listvalue > 0)
            {
                $(gotitbuttonulid).val('Got It!');
                $(gotitbuttonulid).css('background-color', 'lightgreen'); 
            }
            else
            {
                $(gotitbuttonulid).val('Not Yet');
                $(gotitbuttonulid).css('background-color', 'lightyellow');
            }  
    }

    /* $('.edit').click(function(event)
    {
        $("input[name='item']").removeAttr("readonly");
        event.preventDefault();  
    }); */

    $('.editformquantity').click(function(event)
    {        
        var userlistitemid = $(this).data('ulid');

        var quantityulid = '#quantityulid'+userlistitemid;

        //var quantityvalue = $(quantityulid).val();



        $(quantityulid).removeAttr("readonly");

        //$('#savedeleteulid'+userlistitemid).val("Save").addClass('save');
        $('#savedeleteulid'+userlistitemid).val("Save");
        
        event.preventDefault();        
    });

    $('.editformquantity').focusout(function(event)
    {
        
        
        var userlistitemid = $(this).data('ulid');

        var savedeleteulid = 'savedeleteulid'+userlistitemid;
        
        var savedeleteulidstr = '#savedeleteulid'+userlistitemid;

        if (event.relatedTarget != null)
        {
            var relatedtargetid = event.relatedTarget.id;
            if (relatedtargetid == savedeleteulid)
            {
                //$(savedeleteulidstr).trigger('submit');
                //return true;
                event.preventDefault();
                //$(savedeleteulidstr).trigger('submit');
                //alert('after preventdefault');
                return false;

            }
        }        

        var quantityulid = '#quantityulid'+userlistitemid;

        $(quantityulid).attr("readonly", true);        

        //$('#savedeleteulid'+userlistitemid).val("Delete").addClass('delete');
        $('#savedeleteulid'+userlistitemid).val("Delete");
        
        var formData = {
            /* updatecheckedonlist: $('.updatecheckedonlist').val(),*/
            get_action: 'getQuantity',
            userListItemId: userlistitemid
        };
                
        $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            $(quantityulid).val(response['quantity']);
            //alert(response['quantity']);
            //alert('Quantity Reset Success!');
            }).fail(function (response) {
                console.log(response);
                alert('Quantity Reset Failed!');
            });         

        //alert('focus out hit');
    });

    $('.categorycontainer').on('click', '.editformcategorydelegate', function(event) {
        //alert('hittt');
        //return;
        var userlistitemid = event.currentTarget.dataset.ulid;
        addcategoriesselect(userlistitemid);
    });

    
    //$('.categorycontainer').on('click', '.editformcategory', function()
    $('.editformcategory').click(function(event)
    //$('.categorycontainer').click(function(event)
    //$('input').click(function(event)
    { 
        /* var userlistitemid = $('.editformcategory').data('ulid'); */
        var userlistitemid = event.currentTarget.dataset.ulid;
        addcategoriesselect(userlistitemid);
    });

    function addcategoriesselect(userlistitemid)
    {
        //var userlistitemid = $(this).data('ulid');
        
        var elementuliidid = '#categoryulid'+userlistitemid;

        var elementuliclass = '.categoryulid'+userlistitemid;

        var formclass = 'editformcategory';

        var elementidvalue = 'categoryulid'+userlistitemid;

        var arrkey = 'categoryName';

        //var selectclass = '.editformcategory';

        //$(elementuliidid).removeAttr("readonly");        
        
        $('#savedeleteulid'+userlistitemid).val("Save");
        
        //event.preventDefault();

        var formData = {            
            get_action: 'getAllCategories'            
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
            //alert(response.length);
            //alert('getAllCategories Success!');
            $(elementuliidid).remove();       

            adddropdown(elementuliclass, formclass, elementidvalue, userlistitemid, response, arrkey);

            $(elementuliidid).focus();

            }).fail(function (response) {
                
                alert('getAllCategories Failed!');
            }); 
        
        //event.preventDefault();        
    }

    $('.categorycontainer').focusout(function(event)
    {        
        var userlistitemid = $(this).data('ulid');

        var savedeleteulid = 'savedeleteulid'+userlistitemid;
        
        var savedeleteulidstr = '#savedeleteulid'+userlistitemid;

        if (event.relatedTarget != null)
        {
            var relatedtargetid = event.relatedTarget.id;
            if (relatedtargetid == savedeleteulid)
            {
                //$(savedeleteulidstr).trigger('submit');
                //return true;
                event.preventDefault();
                //$(savedeleteulidstr).trigger('submit');
                //alert('after preventdefault');
                return false;

            }
        }        

        var categoryulid = '#categoryulid'+userlistitemid;        

        $(categoryulid).remove();

        var elementidvalue = 'categoryulid'+userlistitemid;

        var appendtoelementclass = '.categoryulid'+userlistitemid;

        var formclass = 'editformcategory';

        var attrname = 'categoryName';

        var editformdelegateclass = 'editformcategorydelegate';

        addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, editformdelegateclass);
        
       //$(categoryulid).attr("readonly", true);

        //$('#savedeleteulid'+userlistitemid).val("Delete").addClass('delete');
        $('#savedeleteulid'+userlistitemid).val("Delete");
        
        var formData = {
            /* updatecheckedonlist: $('.updatecheckedonlist').val(),*/
            get_action: 'getCategory',
            userListItemId: userlistitemid
        };
                
        $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            $(categoryulid).val(response['categoryName']);
            //alert(response['categoryName']);
            //alert('Category Reset Success!');
            }).fail(function (response) {
                console.log(response);
                alert('Category Reset Failed!');
            });         

        //alert('focus out hit');
    });




    $('.editformstore').click(function(event)
    {        

        $("input[name='storeName']").removeAttr("readonly");
        //$('.savedelete').val("Save").addClass('save');
        $('.savedelete').val("Save");
        
        event.preventDefault();        
    });




    $('.editformfrequency').click(function(event)
    {        

        $("input[name='frequency']").removeAttr("readonly");
        //$('.savedelete').val("Save").addClass('save');
        $('.savedelete').val("Save");
        
        event.preventDefault();        
    });

    function adddropdown(addtoelementclass, formclass, elementidvalue, userlistitemid, arr, arrkey)
    {
        /* var adddropdownelem = 
        '<div class="dropdown">'+
        '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
          'Selection'+
         '</button>'+
         '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'; */

         var addselectelem = 
        '<select class="form-control '+formclass+'" data-ulid="'+userlistitemid+'" id="'+elementidvalue+'" style="text-align: center;">';

        var closeselect = '</select>';

        var selectelement = "";

        $.each(arr, function(i, val)
        {
            /* var str = 
            '<input type="text" id="categoryulid'+userlistitemid+'"'+
             'data-ulid="'+userlistitemid+' class="dropdown-item form-control editformcategory" style="text-align: center;" name="categoryName" readonly="readonly"'+
             'value="'+val['categoryName']+'">'; */

            var str =
                '<option value="'+val[arrkey]+'">'+val[arrkey]+'</option>';

             selectelement += str;
        });
        addselectelem += selectelement;
        addselectelem += closeselect;
       
        $(addtoelementclass).html(addselectelem);


         /* var tstelem = '<select class="mdb-select md-form colorful-select dropdown-ins">'+
         '<option value="1">Option 1</option>'+
         '<option value="2">Option 2</option>'+
         '<option value="3">Option 3</option>'+
         '<option value="4">Option 4</option>'+
         '<option value="5">Option 5</option>+'
       '</select>';
        $(addtoelementid).html(tstelem); */
        //$(addtoelementid).html("<p>read this</p>");
        return;
    }

    function addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, formdelegateclass)
    {
        var appendelement = 
        '<input type="text" id="'+elementidvalue+'" data-ulid="'+userlistitemid+'" class="form-control '+formclass+' '+formdelegateclass+'"'+
         'style="text-align: center;" name="'+attrname+'" readonly="readonly" value="">';
        //var appendelement = '<p>test</p>';
        $(appendtoelementclass).append(appendelement);
        return;
    }
    
    $('.savedelete').click(function(event)
    {
        //$("input[name='quantity']").attr("readonly", true);
        //$('.savelistedit').val("true");     
        var uliid = event.currentTarget.dataset.ulid;
        //var quantityulid = '#quantityulid'+uliid;
        var formData = {
            update_action: 'savelistedit',
            //savelistedit: $('.savelistedit').val(),            
            userListItemId: uliid,
            quantity: $('#quantityulid'+uliid).val(),
            categoryName: $('#categoryulid'+uliid).val(),
            storeName: $('#storeulid'+uliid).val(),
            frequency: $('#frequencyulid'+uliid).val()
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
                
                event.preventDefault();
                //alert('Save Failed!');
            });


        //$('.savedelete').val("Delete").addClass('deleteitem');
        $('.savedelete').val("Delete");

        //event.preventDefault();      
        
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
