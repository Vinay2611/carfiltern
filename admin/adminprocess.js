/*
 * Admin Login
 */
$("#adminloginform").submit(function(e)
{
    e.preventDefault();
    $elm=$(".btn-submit");
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    var username = $("#username").val();
    var password = $("#password").val();
    if(username == "" || password == "")
    {
        _toastr("Username or password cannot be empty","bottom-right","info",false);
        return false;
    }
    else
    {
        $.ajax({
            type: "POST",
            url	: "adminprocess.php",
            data:{
                ajax_username : username,
                ajax_password : password,
                ajax_adminlogin : true
            },
            success: function (data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if( data.valid == 1)
                {
                    window.location.href = "index.php";
                    return false;
                }
                else
                {
                    _toastr(data.message,"bottom-right","info",false);
                    return false;
                }
            }
        });
    }
});

/*
* Change Admin Password
*/
$("#adminchangepass").submit(function(e)
{
   e.preventDefault();
   $elm=$(".btn-submit");
   $elm.hide();
   $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
   var current_password = $("#current_password").val();
   var new_password = $("#new_password").val();
   var rpassword = $("#rpassword").val();
   if(current_password == "" || new_password == "" || rpassword == "")
   {
       $(".submit-loading").remove();
        $elm.show();
       _toastr("Currrent password or new password cannot be empty","bottom-right","info",false);
       return false;
   }
   else if(new_password !=  rpassword)
   {
       $(".submit-loading").remove();
        $elm.show();
       _toastr("New Password & Confirm Password does not match","bottom-right","info",false);
       return false;
   }
   else
   {
       $.ajax({
           type: "POST",
           url	: "adminprocess.php",
           data:{
               ajax_current_password : current_password,
               ajax_new_password : new_password,
               ajax_confirm_password : rpassword,
               ajax_changepassword : true
           },
           success: function (data)
           {
               var data = jQuery.parseJSON(data);
                $(".submit-loading").remove();
                $elm.show();
                if( data.valid == 1)
                {
                   _toastr(data.message,"bottom-right","success",false);
                   setTimeout(function(){
                       location.href = 'index.php';
                   }, 3000);
                   return false;
                }
                else
                {
                    _toastr(data.message,"bottom-right","info",false);
                    return false;
                }

           }
       });
   }
});


/*product insert query*/
$('#insert_products').submit(function(e)
{
    e.preventDefault();
    $elm=$(".btn-submit");
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    $form=$(this);
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: 'adminprocess.php',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(resp) {
            resp=JSON.parse(resp);
            if(resp.success){
                _toastr(resp.msg,"bottom-right","success",false);
                setTimeout(function(){
                    window.location.href = 'cars.php';
                }, 4000);
            }else{
                _toastr(resp.msg,"bottom-right","info",false);
            }
            $(".submit-loading").remove();
            $elm.show();
        },
        error: function(data) {
        }
    });
    return false

});

/*Delete Products*/
$('.deleteproduct').click(function(){
    var id = $(this).attr("data-id");
    $elm = $(this);
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    $.ajax({
        type : 'POST',
        url	: "adminprocess.php",
        data :  {
            id : id,
            deleteproduct : true
        },
        success : function(data)
        {
            $(".submit-loading").remove();
            $elm.show();
            var data = jQuery.parseJSON(data);
            if(data.valid)
            {
                $('#product'+id).hide();
                _toastr(data.message,"bottom-right","success",false);
                return false;
            }
            else
            {
                _toastr(data.message,"bottom-right","error",false);
                return false;
            }
            return false;
        }
    });

});


/*Excel Upload*/
$('#excelupload').submit(function(e)
{
    e.preventDefault();
    $elm=$(".btn-submit");
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    $form=$(this);
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: 'adminprocess.php',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(resp) {
            resp=JSON.parse(resp);
            if(resp.success){
                _toastr(resp.msg,"bottom-right","success",false);
                setTimeout(function(){
                    window.location.href = 'cars.php';
                }, 4000);
            }else{
                _toastr(resp.msg,"bottom-right","info",false);
            }
            $(".submit-loading").remove();
            $elm.show();
        },
        error: function(data) {
        }
    });
    return false

});


$('.setfeature').click(function(){
    var id = $(this).attr("data-id");
    var value = $(this).attr("data-value");
    $elm = $(this);
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    $.ajax({
        type : 'POST',
        url	: "adminprocess.php",
        data :  {
            id : id,
            stat:value,
            setfeature : true
        },
        success : function(data)
        {
            $(".submit-loading").remove();
            $elm.show();
            var data = jQuery.parseJSON(data);
            if(data.valid)
            {
                
                _toastr(data.message,"bottom-right","success",false);
                setTimeout(function(){
                    location.reload();
                }, 4000);
                return false;
            }
            else
            {
                _toastr(data.message,"bottom-right","error",false);
                return false;
            }
            return false;
        }
    });

});

$('.setrecommended').click(function(){
    var id = $(this).attr("data-id");
    var value = $(this).attr("data-value");
    $elm = $(this);
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    $.ajax({
        type : 'POST',
        url	: "adminprocess.php",
        data :  {
            id : id,
            stat:value,
            setrecommended : true
        },
        success : function(data)
        {
            $(".submit-loading").remove();
            $elm.show();
            var data = jQuery.parseJSON(data);
            if(data.valid)
            {
                
                _toastr(data.message,"bottom-right","success",false);
                setTimeout(function(){
                    location.reload();
                }, 4000);
                return false;
            }
            else
            {
                _toastr(data.message,"bottom-right","error",false);
                return false;
            }
            return false;
        }
    });

});