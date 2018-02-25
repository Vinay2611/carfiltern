var delay = (function(){
  var timer = 0;
  return function(callback, ms){
  clearTimeout (timer);
  timer = setTimeout(callback, ms);
 };
})();

var opts = {
        lines: 13 // The number of lines to draw
      , length: 44 // The length of each line
      , width: 9 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 0.7 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: false // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
      }
var search = '';
var years = '';
//var minmileage = 1000;
//var maxmileage = 6000;
var mincost = 1000;
var maxcost = 15000;
var category = '';
var gearbox = '';
var feul = '';
var seats = '';
var drivetrain = '';
var sort_type = '';
var spinner = new Spinner(opts);
var searchIDs = '';

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, " ");
}



function getCars()
{
    
    $.ajax({
        type: "POST",
        url	: "process.php",
        data:{
            aj_search : search,
            aj_years : years,
            aj_sort : sort_type,
            //aj_minmileage : minmileage,
            //aj_maxmileage : maxmileage,
            aj_mincost : mincost,
            aj_maxcost : maxcost,
            aj_category : category,
            aj_gearbox : gearbox,
            aj_feul : feul,
            aj_seats : seats,
            aj_drivetrain : drivetrain,
            getcars : true
        },
        cache: false,
        beforeSend: function(){
            var target = document.getElementById('carcontent')
            spinner.spin(target);
        },
        complete: function(){
            
            spinner.stop();
        },
        success: function (resp)
        {
            resp=JSON.parse(resp);
            $('#total_cars').html(resp.count);
            $('#carcontent').empty().append(resp.data);
            return false;
        }
    });
}

$('#searchbox').keyup(function() {
  delay(function(){
    search = $('#searchbox').val();
    getCars();
  }, 1000 );
});

$('#sort_filter').on('change', function() {
    sort_type = this.value;
    getCars();
});

$('#year_filter').on('change', function() {
    years = this.value;
    getCars();
});

$('#gearbox').on('change', function() {
    gearbox = this.value;
    getCars();
});

$('#fuel').on('change', function() {
    feul = this.value;
    getCars();
});

$('#seats').on('change', function() {
    seats = this.value;
    getCars();
});

$('#drivetrain').on('change', function() {
    drivetrain = this.value;
    getCars();
});
  
/*$('input[name="checked_id"]').click(function() {
    searchIDs = $('input[name="checked_id"]:checked').map(function(){
        return $(this).val();
    });
    category = searchIDs.get();
    getCars();
});*/

$('.catimg_class').click(function() {
    category = '';
    if($(this).hasClass('cat_opacity'))
    {
        $(this).parent('.checkbox').find('.cat_class').prop('checked',true);
        $(this).removeClass('cat_opacity');
    }
    else
    {
        $(this).parent('.checkbox').find('.cat_class').prop('checked',false);
        $(this).addClass('cat_opacity');
       
    }
    searchIDs = $('input[name="checked_id"]:checked').map(function(){
        return $(this).val();
    });
    category = searchIDs.get();
    getCars();
});

function initSliders(){
  

    var sliderB = new Slider("#monthly_slider",{
      min: 1000,
      max: 15000,
      values:[1000, 15000],
      step: 100,
      range:true,
      tooltip:"hide"
    });
    sliderB.on('slide', function(e)
    {
        var ui = $('#monthly_slider').attr('data-value').split(",");
        mincost = ui[0];
        maxcost = ui[1];
        $("#monthly_range_label" ).html(numberWithCommas(mincost) + '  - ' + numberWithCommas(maxcost));

    });
    sliderB.on('slideStop', function(e)
    {
        var ui = $('#monthly_slider').attr('data-value').split(",");
        mincost = ui[0];
        maxcost = ui[1];
        $("#monthly_range_label" ).html(numberWithCommas(mincost) + '  - ' + numberWithCommas(maxcost));
        $('#monthly_filter').val(mincost + '-' + maxcost).trigger('change');
        getCars();
    });
  
    $('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
    });

}

/* order placed query */
$('#order').submit(function(e)
{
    e.preventDefault();
    $elm=$(".btn-submit");
    $elm.hide();
    $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
    $form=$(this);
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(resp) {
            resp=JSON.parse(resp);
            if(resp.success){
                /*$.notify({
                    message: resp.msg 
                },{
                    allow_dismiss: true,
                    type: 'success',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1000000
                });*/
                Alertify.log.success("Enquiry saved and Mail send successfully");
                setTimeout(function(){
                    location.reload();
                }, 3000);

            }else{
                /*$.notify({
                    message: resp.msg 
                },{
                    allow_dismiss: true,
                    type: 'danger',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1000000
                });*/
                Alertify.log.error("Mail failed to send!!");
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
            $(".submit-loading").remove();
            $elm.show();
        },
        error: function(data) {
        }
    });
    return false

});
/*Enquiry end*/