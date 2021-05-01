  $(document).ready(function() {
    
    //++++++++++++++++++++++++++++++++++++++++Got It+++++++++++++++++++++++++++++++++++++++++++++++
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

    //++++++++++++++++++++++++++++++++++++++++Quantity+++++++++++++++++++++++++++++++++++++++++++++++
    $('.editformquantity').click(function(event)
    {        
        var userlistitemid = $(this).data('ulid');

        var quantityulid = '#quantityulid'+userlistitemid;

        //var quantityvalue = $(quantityulid).val();



        $(quantityulid).removeAttr("readonly");

        $(quantityulid).val('');

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

    //++++++++++++++++++++++++++++++++++++++++Category+++++++++++++++++++++++++++++++++++++++++++++++
    $('.categorycontainer').on('click', '.editformcategorydelegate', function(event) {
        //alert('at on delegate');        
        var userlistitemid = event.currentTarget.dataset.ulid;
        addcategoriesselect(userlistitemid);
    });    
    
    $('.editformcategory').click(function(event)    
    {         
        var userlistitemid = event.currentTarget.dataset.ulid;
        addcategoriesselect(userlistitemid);
    });

    function addcategoriesselect(userlistitemid)
    {   
        var elementuliidid = '#categoryulid'+userlistitemid;

        var elementuliclass = '.categoryulid'+userlistitemid;

        var formclass = 'editformcategory';

        var elementidvalue = 'categoryulid'+userlistitemid;

        var arrkey = 'categoryName';
        
        $('#savedeleteulid'+userlistitemid).val("Save");  

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
            
            $(elementuliidid).remove();       

            adddropdown(elementuliclass, formclass, elementidvalue, userlistitemid, response, arrkey);

            $(elementuliidid).focus();

            }).fail(function (response) {
                
                alert('getAllCategories Failed!');
            });
    }

    $('.categorycontainer').focusout(function(event)
    {        
        var userlistitemid = $(this).data('ulid');

        var savedeleteulid = 'savedeleteulid'+userlistitemid; 

        if (event.relatedTarget != null)
        {
            var relatedtargetid = event.relatedTarget.id;
            if (relatedtargetid == savedeleteulid)
            {                
                event.preventDefault();                
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
        
        $('#savedeleteulid'+userlistitemid).val("Delete");
        
        var formData = {
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
            }).fail(function (response) {
                console.log(response);
                alert('Category Reset Failed!');
            }); 
    });



    //++++++++++++++++++++++++++++++++++++++++Store+++++++++++++++++++++++++++++++++++++++++++++++
    $('.storecontainer').on('click', '.editformstoredelegate', function(event) {
        //alert('at on delegate');        
        var userlistitemid = event.currentTarget.dataset.ulid;
        addstoresselect(userlistitemid);
    });    
    
    $('.editformstore').click(function(event)    
    {         
        var userlistitemid = event.currentTarget.dataset.ulid;
        addstoresselect(userlistitemid);
    });

    function addstoresselect(userlistitemid)
    {   
        var elementuliidid = '#storeulid'+userlistitemid;

        var elementuliclass = '.storeulid'+userlistitemid;

        var formclass = 'editformstore';

        var elementidvalue = 'storeulid'+userlistitemid;

        var arrkey = 'storeName';
        
        $('#savedeleteulid'+userlistitemid).val("Save");  

        var formData = {            
            get_action: 'getAllStores'            
        };
                
         $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {            
            
            $(elementuliidid).remove();       

            adddropdown(elementuliclass, formclass, elementidvalue, userlistitemid, response, arrkey);

            $(elementuliidid).focus();

            }).fail(function (response) {
                
                alert('getAllStores Failed!');
            });
    }

    $('.storecontainer').focusout(function(event)
    {        
        var userlistitemid = $(this).data('ulid');

        var savedeleteulid = 'savedeleteulid'+userlistitemid; 

        if (event.relatedTarget != null)
        {
            var relatedtargetid = event.relatedTarget.id;
            if (relatedtargetid == savedeleteulid)
            {                
                event.preventDefault();                
                return false;
            }
        }        

        var storeulid = '#storeulid'+userlistitemid;        

        $(storeulid).remove();

        var elementidvalue = 'storeulid'+userlistitemid;

        var appendtoelementclass = '.storeulid'+userlistitemid;

        var formclass = 'editformstore';

        var attrname = 'storeName';

        var editformdelegateclass = 'editformstoredelegate';

        addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, editformdelegateclass);
        
        $('#savedeleteulid'+userlistitemid).val("Delete");
        
        var formData = {
            get_action: 'getStore',
            userListItemId: userlistitemid
        };
                
        $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            $(storeulid).val(response['storeName']);
            }).fail(function (response) {
                console.log(response);
                alert('Store Reset Failed!');
            }); 
    });



    //++++++++++++++++++++++++++++++++++++++++Frequency+++++++++++++++++++++++++++++++++++++++++++++++
    $('.frequencycontainer').on('click', '.editformfrequencydelegate', function(event) {
        //alert('at on delegate');        
        var userlistitemid = event.currentTarget.dataset.ulid;
        addfrequenciesselect(userlistitemid);
    });    
    
    $('.editformfrequency').click(function(event)    
    {         
        var userlistitemid = event.currentTarget.dataset.ulid;
        addfrequenciesselect(userlistitemid);
    });

    function addfrequenciesselect(userlistitemid)
    {   
        var elementuliidid = '#frequencyulid'+userlistitemid;

        var elementuliclass = '.frequencyulid'+userlistitemid;

        var formclass = 'editformfrequency';

        var elementidvalue = 'frequencyulid'+userlistitemid;

        var arrkey = 'frequency';
        
        $('#savedeleteulid'+userlistitemid).val("Save");  

        var formData = {            
            get_action: 'getAllFrequencies'            
        };
                
         $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {            
            
            $(elementuliidid).remove();       

            adddropdown(elementuliclass, formclass, elementidvalue, userlistitemid, response, arrkey);

            $(elementuliidid).focus();

            }).fail(function (response) {
                
                alert('getAllFrequencies Failed!');
            });
    }

    $('.frequencycontainer').focusout(function(event)
    {        
        var userlistitemid = $(this).data('ulid');

        var savedeleteulid = 'savedeleteulid'+userlistitemid; 

        if (event.relatedTarget != null)
        {
            var relatedtargetid = event.relatedTarget.id;
            if (relatedtargetid == savedeleteulid)
            {                
                event.preventDefault();                
                return false;
            }
        }        

        var frequencyulid = '#frequencyulid'+userlistitemid;        

        $(frequencyulid).remove();

        var elementidvalue = 'frequencyulid'+userlistitemid;

        var appendtoelementclass = '.frequencyulid'+userlistitemid;

        var formclass = 'editformfrequency';

        var attrname = 'frequency';

        var editformdelegateclass = 'editformfrequencydelegate';

        addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, editformdelegateclass);
        
        $('#savedeleteulid'+userlistitemid).val("Delete");
        
        var formData = {
            get_action: 'getFrequency',
            userListItemId: userlistitemid
        };
                
        $.ajax({
        type: "POST",
        url: "../models/userlistitem.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (response) {
            $(frequencyulid).val(response['frequency']);
            }).fail(function (response) {
                console.log(response);
                alert('Frequency Reset Failed!');
            }); 
    });


    //++++++++++++++++++++++++++++++++++++++++Replace text input with select dropdown+++++++++++++++++++++++++++++++++++++++++++++++
    function adddropdown(addtoelementclass, formclass, elementidvalue, userlistitemid, arr, arrkey)
    {       
         var addselectelem = 
        '<select class="form-control '+formclass+'" data-ulid="'+userlistitemid+'" id="'+elementidvalue+'" style="text-align: center;">';

        var closeselect = '</select>';

        var selectelement = "";

        $.each(arr, function(i, val)
        {  
            var str = '<option value="'+val[arrkey]+'">'+val[arrkey]+'</option>';

            var strselected = '<option value="'+val[arrkey]+'" selected>'+val[arrkey]+'</option>';

            selectelement += val[arrkey] == 'unspecified' ? strselected : str;
        });
        addselectelem += selectelement;
        addselectelem += closeselect;
       
        $(addtoelementclass).html(addselectelem);
         
        return;
    }

    //++++++++++++++++++++++++++++++++++++++++Replace select dropdown with text input+++++++++++++++++++++++++++++++++++++++++++++++
    function addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, formdelegateclass)
    {
        var appendelement = 
        '<input type="text" id="'+elementidvalue+'" data-ulid="'+userlistitemid+'" class="form-control '+formclass+' '+formdelegateclass+'"'+
         ' data-inputstate="typetext" style="text-align: center;" name="'+attrname+'" readonly="readonly" value="">';
        
        $(appendtoelementclass).append(appendelement);
        return;
    }
    
    //++++++++++++++++++++++++++++++++++++++++ajax save edited data+++++++++++++++++++++++++++++++++++++++++++++++
    $('.savedelete').click(function(event)
    {        
        var userlistitemid = event.currentTarget.dataset.ulid;
        
        var formData = {
            update_action: 'savelistedit',                       
            userListItemId: userlistitemid,
            quantity: $('#quantityulid'+userlistitemid).val(),
            categoryName: $('#categoryulid'+userlistitemid).val(),
            storeName: $('#storeulid'+userlistitemid).val(),
            frequency: $('#frequencyulid'+userlistitemid).val()
        };

        $.ajax({
            type: "POST",
            url: "../models/userlistitem.php",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (response) {
            //alert(response);
            }).fail(function (response) {
                event.preventDefault();
                //alert('Save Failed!');
            });
        
        $('#quantityulid'+userlistitemid).attr("readonly", true);

        if (!$('#categoryulid'+userlistitemid).data('inputstate'))
        {
            var elementidvalue = 'categoryulid'+userlistitemid;

            var appendtoelementclass = '.categoryulid'+userlistitemid;

            var formclass = 'editformcategory';

            var attrname = 'categoryName';

            var editformdelegateclass = 'editformcategorydelegate';

            $('#categoryulid'+userlistitemid).remove();

            addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, editformdelegateclass);

            var categoryname = formData['categoryName'];

            $('#categoryulid'+userlistitemid).val(categoryname);
        }

        if (!$('#storeulid'+userlistitemid).data('inputstate'))
        {
            var elementidvalue = 'storeulid'+userlistitemid;

            var appendtoelementclass = '.storeulid'+userlistitemid;

            var formclass = 'editformstore';

            var attrname = 'storeName';

            var editformdelegateclass = 'editformstoredelegate';

            $('#storeulid'+userlistitemid).remove();

            addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, editformdelegateclass);

            var storename = formData['storeName'];

            $('#storeulid'+userlistitemid).val(storename);
        }

        if (!$('#frequencyulid'+userlistitemid).data('inputstate'))
        {
            var elementidvalue = 'frequencyulid'+userlistitemid;

            var appendtoelementclass = '.frequencyulid'+userlistitemid;

            var formclass = 'editformfrequency';

            var attrname = 'frequency';

            var editformdelegateclass = 'editformfrequencydelegate';

            $('#frequencyulid'+userlistitemid).remove();

            addforminput(appendtoelementclass, elementidvalue, userlistitemid, formclass, attrname, editformdelegateclass);

            var frequency = formData['frequency'];

            $('#frequencyulid'+userlistitemid).val(frequency);
        }

        $('.savedelete').val("Delete");        
    });

    //++++++++++++++++++++++++++++++++++++++++delete item from current user list+++++++++++++++++++++++++++++++++++++++++++++++
    //todo



    //notes only ----- DELETE

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
