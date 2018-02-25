<?php include("header.php");?>
<style type="text/css" >
#swfupload-control p{ margin:10px 5px; font-size:0.9em; }
#log{ margin:0; padding:0; width: 100%;;}
#log li{ list-style-position:inside; margin:2px; border:1px solid #ccc; padding:10px; font-size:12px; 
	font-family:Arial, Helvetica, sans-serif; color:#333; background:#fff; position:relative;}
#log li .progressbar{ border:1px solid #333; height:5px; background:#fff; }
#log li .progress{ background:#999; width:0%; height:5px; }
#log li p{ margin:0; line-height:18px; }
#log li.success{ border:1px solid #339933; background:#ccf9b9; }
#log li span.cancel{ position:absolute; top:5px; right:5px; width:20px; height:20px; 
	background:url('js/swfupload/cancel.png') no-repeat; cursor:pointer; }
</style>
<section id="middle" xmlns="http://www.w3.org/1999/html">
    <header id="page-header">
        <h1>Car</h1>
    </header>
    <div id="content" class="padding-20">
        <div class="col-md-6">
            <div id="panel-1" class="panel panel-info">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>Bulk Image Upload</strong>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div id="swfupload-control">
                            <p>Upload upto 20 image files(jpg, png, gif), each having maximum size of 5MB</p>
                            <input type="button" id="button" />
                            <p id="queuestatus" ></p>
                            <ol id="log"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="panel-1" class="panel panel-info mypanel">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>Record Upload</strong>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger margin-bottom-30">
                        <h4><a href = 'uploads/samplesheet.csv' target='_blank'><strong>Download </strong></a>Sample csv File</h4>
                        <ul>
                            <li>Download the sample csv file by clicking on above download link</li>
                            <li>Remove sample record and write your data in correct place</li>
                            <li><b>Note:</b> Image name should be proper with extension</li>
                            <li>Then select the file for upload and click on import</li>
                            <li><b>Note:You can update the information from car table if any data is incorrect.</b></li>
                        </ul>
                    </div>
                    <form method = "post" id='excelupload' action = ""  enctype="multipart/form-data">
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="fancy-file-upload fancy-file-success">
                                            <i class="fa fa-upload"></i>
                                            <input type="file" class="form-control" name="file" onchange="jQuery(this).next('input').val(this.value);" />
                                            <input type="text" class="form-control" placeholder="no file selected" readonly="" />
                                            <span class="button">Choose File</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" name="type" value="uploadexcel">
                                        <button name = "submit" type = "submit"  class="btn btn-info btn-sm btn-submit" >IMPORT</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<?php include("footer.php");?>
<script type="text/javascript" src="js/swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/jquery.swfupload.js"></script>
<script type="text/javascript">

$(function(){
	$('#swfupload-control').swfupload({
		upload_url: "uploadfile.php",
		file_post_name: 'uploadfile',
		file_size_limit : "5120",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 20,
		flash_url : "js/swfupload/swfupload.swf",
		button_image_url : 'js/swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log').append(listitem);
			$('li#'+file.id+' .cancel').bind('click', function(){
				var swfu = $.swfupload.getInstance('#swfupload-control');
				swfu.cancelUpload(file.id);
				$('li#'+file.id).slideUp('fast');
			});
			// start the upload since it's queued
			$(this).swfupload('startUpload');
		})
		.bind('fileQueueError', function(event, file, errorCode, message){
			alert('Size of the file '+file.name+' is greater than limit');
		})
		.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
			$('#queuestatus').text('Files Selected: '+numFilesSelected+' / Queued Files: '+numFilesQueued);
		})
		.bind('uploadStart', function(event, file){
			$('#log li#'+file.id).find('p.status').text('Uploading...');
			$('#log li#'+file.id).find('span.progressvalue').text('0%');
			$('#log li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log li#'+file.id);
			item.find('div.progress').css('width', '100%');
			item.find('span.progressvalue').text('100%');
			var pathtofile='<a href="../upload/'+file.name+'" target="_blank" >view &raquo;</a>';
			item.addClass('success').find('p.status').html('Done!!! | '+pathtofile);
		})
		.bind('uploadComplete', function(event, file){
			// upload has completed, try the next one in the queue
			$(this).swfupload('startUpload');
		})
	
});	

</script>