
$(document).ready(function(){
	_page_init();
});

function _page_init(){
	//show the location options.
	var op_str = '<option value="all">All Locations</option>';
	for(var i = 0; i< locations.length; i++){
		op_str += '<option value="'+locations[i].fldCode+'">'+locations[i].fldLocationName+'</option>';
	}
	$('#sel_location').html(op_str);
	
	// for the All Inventory
	var op_str = '<option value="all">All Inventories</option>';
	for(var i = 0; i< statuscodes.length; i++){
		op_str += '<option value="'+statuscodes[i].fld_code+'">'+statuscodes[i].fld_desc+'</option>';
	}
	$('#sel_inventory').html(op_str);
	
	
	//for the tyepes;
	var op_str = '<option value="all">All Types</option>';
	for(var i = 0; i< types.length; i++){
		op_str += '<option value="'+types[i].fldCode+'">'+types[i].fldDesc+'</option>';
	}
	$('#sel_type').html(op_str);
	
	//for the price part
	
	var op_str = '';
	for(var i = 0; i< Ve_Price_arr.length; i++){
		if(Ve_Price_arr[i] == 180000) op_str += '<option value="'+Ve_Price_arr[i]+'">All Prices</option>';
		else op_str += '<option value="'+Ve_Price_arr[i]+'">Under '+new Intl.NumberFormat().format(Ve_Price_arr[i])+'$</option>';
	}
	$('#sel_price').html(op_str);
	
	
	//for the  ordermeter part
	var op_str = '';
	for(var i = 0; i< Ve_Ordermeter_arr.length; i++){
		if(Ve_Ordermeter_arr[i] == 'all') op_str += '<option value="'+Ve_Ordermeter_arr[i]+'">All KM\'s</option>';
		else op_str += '<option value="'+Ve_Ordermeter_arr[i]+'">Under '+new Intl.NumberFormat().format(Ve_Ordermeter_arr[i])+'</option>';
	}
	$('#sel_ordermeter').html(op_str);
	
	
	//for the year part
	var op_str = '<option value="all">All Years</option>';
	for(var i = 2018; i >=1998; i--){
		 op_str += '<option value="'+i+'">'+i+'</option>';
	}
	$('#sel_year').html(op_str);
	
	//for the makes
	var op_str = '<option value="all">All Makes</option>';
	for(var i = 0; i< makes.length; i++){
		op_str += '<option value="'+makes[i].fldMake+'">'+makes[i].fldMake+'</option>';
	}
	$('#sel_make').html(op_str);
	
}


function _datatable_init(){
	$('#example').DataTable({
    	"language": {
    		"lengthMenu": "_MENU_"
    	},
		"bLengthChange": true,
		"paging": true
		//"bInfo":false
    });
    $('.dataTables_filter input').attr('placeholder','Search...');


    //DOM Manipulation to move datatable elements integrate to panel
	$('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
	$('.panel-ctrls').append("<i class='separator'></i>");
	$('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

	$('.panel-footer').append($(".dataTable+.row"));
	$('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
}

function searchBtn(){
	var username = $('#sel_user_name').val();
	var useremail = $('#sel_email').val();
  var use_status = $('#sel_use_status').val();
	
	$.ajax({
		type: 'post'
    ,dataType: 'json'
		, async: true
		, url: base_url+'admin/searchUserInfo'
		, data:  'username='+username + '&email='+useremail + '&use_status='+use_status 
		, success: function(json) {
			if(json.status == 'success'){
				showInfo_search(json.userarr);
				vbShowMessage('Successfully Searched','success');	
        _page_init();
			}
			
    }
		, error: function(data, status, err) {
			
		},
		complete: function() {
			
		}
	});
}

function showInfo_search(pagedata){
	var obj = $('#example').children('tbody');
	
	var table = $('#example').DataTable();
	table.clear().draw();
	var created = '';  var updated = ''; var check_str = '';
	for(var i = 0; i < pagedata.length; i++){
		var data = pagedata[i];
		created = ''; updated = '';
      if(data['created_at'] !== null){
        created = (data['created_at']).substr(0,10);
      }
        
      if(data['updated_at'] !== null)
        updated = (data['updated_at']).substr(0,10);
      
      check_str = '';
			if(data['use_status'] == 1){
				check_str = 'checked="checked"';
			}
		$('#example').DataTable().row.add([
			$('#example').DataTable().column(0).data().length+1,
			'<a onclick="showdetialInfo('+ data['id'] +','+data['board_saved']+')" href="#md_view_visionboard" data-toggle="modal">'+data['first_name'] + ' ' + data['last_name']+'</a>',
			data['email'],
      data['gender'],
      data['age'],
      data['board_title'],
			created,
      updated,
      data['ip'],
			'<input class="bootstrap-switch" id="use_status_'+data['id']+'" data="'+data['id']+'" type="checkbox"'+check_str+' data-size="mini" data-on-color="success" data-off-color="default" data-on-text="I" data-off-text="O">',
      '<button class="btn btn-default btn-sm" onclick="saveUserInfo('+data['id']+')"><i class="fa fa-save"></i></button>',
			'<button class="btn btn-default btn-sm" onclick="showdetialInfo('+data['id']+','+data['board_saved']+')" href="#md_view_visionboard" data-toggle="modal"><i class="fa fa-eye"></i></button>'
      ]);
	}
	$('#example').DataTable().draw();
}


function closeMdVisionBoardImg(){
	var a = $('#h_img_visionboard').attr('bgurl');
	$('#img_visionboard').attr('src',a);
	$('#img_visionboard').attr('width','820px');
	$('#img_visionboard').attr('height','auto');
}

function showdetialInfo(id,board_saved){
	if(Number(board_saved) === 0){
		var a = $('#h_img_visionboard').attr('bgurl');
		$('#img_visionboard').attr('src',a);
		$('#img_visionboard').attr('width','820px');
		$('#img_visionboard').attr('height','auto');
		return;
	}
  $.ajax({
		type: 'post'
    ,dataType: 'json'
		, async: true
		, url: base_url+'admin/getUserBoard'
		, data:  'id='+id
		, success: function(json) {
			if(json.status == 'success'){
				$('#img_visionboard').attr('src', json.boardurldata.replaceAll(' ','+'));
				var w = json.width;
				var w1 = w;
				var h = json.height;
				if(Number(h) > 800 || Number(w) > 820){
					if(Number(w) > Number(h)){
						w = '820';
						h = 'auto';	
					}else{
						h = '800';
						w = 'auto';
					}
					
				}
				$('#img_visionboard').attr('width',w);
				$('#img_visionboard').attr('height',h);
				vbShowMessage('Successfully showed','success');	
      }else{
        var a = $('#h_img_visionboard').attr('bgurl');
				$('#img_visionboard').attr('src',a);	
				$('#img_visionboard').attr('width','820px');
				$('#img_visionboard').attr('height','auto');
      }
		}
		, error: function(data, status, err) {
			
		},
		complete: function() {
			
		}
	});
}


function saveUserInfo(id){
  var use_status = $('#use_status_'+id).bootstrapSwitch('state');
  if(use_status === true){
    use_status = 1;
  }else{
    use_status = 0;
  }
  $.ajax({
		type: 'post'
    ,dataType: 'json'
		, async: true
		, url: base_url+'admin/saveUserInfo'
		, data:  'id='+id + '&use_status='+use_status
		, success: function(json) {
			if(json.status == 'success'){
				vbShowMessage('Successfully Saved','success');	
      }else{
        vbShowMessage('Failed','warning');	
      }
		}
		, error: function(data, status, err) {
			
		},
		complete: function() {
			
		}
	});
}


/* Export Functions */
function getExportData(pagedata){
	var exdata = new Array;
	for(var i = 0; i < pagedata.length; i ++){
		var data = pagedata[i];
		var tmp = new Object;
		tmp.no = (i+1);
		tmp.username = data['first_name'] + ' ' + data['last_name'];
		tmp.email  = data['email'];
    tmp.gender  = data['gender'];
    tmp.age  = data['age'];
    exdata[i] = tmp;
	}
	return  exdata;
}

$('#btn_export_csv').on('click',function(){
	var titlearr = ['no','username','email','gender','age'];
	var exdata = getExportData(pagedata); 
	$.ajax({
		type: 'post'
	    ,dataType: 'json'
		, async: true
		, url: base_url+'admin/getCSV'
		,data: 'pagedata='+JSON.stringify(exdata) + '&titlearr=' + JSON.stringify(titlearr)
		, success: function(json) {
			if(json.state == 'success'){
				vbShowMessage('Successfully Searched.','success');

				var fileName = json.csv;
			 	var e = document.createElement('a');
			 	e.href = base_url +  fileName;
			 	e.target = '_blank';
			 	document.body.appendChild(e);
			 	e.click();
			 	document.body.removeChild(e);
			}
	    }
		, error: function(data, status, err) {
			
		},
		complete: function() {
			
		}
	});
});

function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
        save.download = fileName || filename;
	       if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
				document.location = save.href; 
// window event not working here
			}else{
		        var evt = new MouseEvent('click', {
		            'view': window,
		            'bubbles': true,
		            'cancelable': false
		        });
		        save.dispatchEvent(evt);
		        (window.URL || window.webkitURL).revokeObjectURL(save.href);
			}	
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}


$('#btn_export_pdf').on('click',function(){
	var subtitlearr = ['no','username','email','gender','age'];
	var title = 'User List';
	var exdata = getExportData(pagedata);

  	$.ajax({
    	type: 'post'
      ,dataType: 'json'
    	, async: true
    	, url: base_url+'admin/getPDF'
    	, data:'pagedata='+JSON.stringify(exdata) + '&subtitlearr=' + JSON.stringify(subtitlearr) + '&title='+title
    	, success: function(json) {
    		if(json.state == 'success'){
    			vbShowMessage('Successfully Opened.','success'); 
    			var fileName = json.pdf;
					var fileURL = base_url + 'attatchment/'+fileName;
					
					var e = document.createElement('a');
					//e.href = fileURL;
					e.href = json.path;
					e.download = "export.pdf";
					e.target = '_blank';
					document.body.appendChild(e);
					e.click();
					document.body.removeChild(e);

				}
			}
    	, error: function(data, status, err) {
    		
    	},
    	complete: function() {
    		
    	}
    });


});

$('#btn_export_xls').on('click',function(){
	var subtitlearr = ['no','username','email','gender','age'];
	var title = 'Users List';
	var exdata = getExportData(pagedata);
  	$.ajax({
    	type: 'post'
      ,dataType: 'json'
    	, async: true
    	, url: base_url+'admin/getXLS'
    	, data:'pagedata='+JSON.stringify(exdata) + '&subtitlearr=' + JSON.stringify(subtitlearr) + '&title='+title
    	, success: function(json) {
    		if(json.state == 'success'){
    			vbShowMessage('Successfully Opened.','success');
    			
    			var fileName = json.filename;
					var e = document.createElement('a');
					e.href = base_url +  fileName;
					e.target = '_blank';
					document.body.appendChild(e);
					e.click();
					document.body.removeChild(e);

				}
			}
    	, error: function(data, status, err) {
    		
    	},
    	complete: function() {
    		
    	}
    });


});

