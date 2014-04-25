// JavaScript Document
$(document).ready(function() {
        
		 $('table.dataTable tbody tr').live("mouseover", function() {
            $(this).addClass('highlightOverColor');
         }).live("mouseout", function() {
            $(this).removeClass('highlightOverColor');
         }).live("click", function() {
            
			if($(this).hasClass('highlightClickColor'))
				$(this).removeClass('highlightClickColor');
			else
				$(this).addClass('highlightClickColor');
         });
		 
		 $('#menu a').click(function (e) {
					
				if($(this).hasClass('linkPage')){
					return ;	
				}
					 
				e.preventDefault()
 				var subtab = $(this).attr('href');
				$(".subTab").hide();
				$(subtab).fadeIn(500);
						//alert(form.find("#page").val());
						//$('#ajax_body').ajaxloader();
						
					///	dataRequest();
 		});
		
		/*$(window).keydown(function(event){
			if(event.keyCode == 13) {
			  event.preventDefault();
			  return false;
			}
		 });*/
		 
		 $('input, select').live("keydown", function(e) {
                /* ENTER PRESSED*/
                if (e.keyCode == 13) {
                    /* FOCUS ELEMENT */
					e.preventDefault();
                    var inputs = $(this).parents("form").eq(0).find(':input:not([readonly="readonly"])');
                    var idx = inputs.index(this);
					//alert(inputs[idx].name);
					if(inputs[idx].name=='BGAMOUNT')
						idx++;
						
                    if (idx == inputs.length - 1) {
                        inputs[0].select()
                    } else {
					    
						inputs[idx + 1].focus(); //  handles submit buttons
                        inputs[idx + 1].select();
                    }
                    return false;
              
				
				 
				
				  }
            });
			
		function keyMoveNext(){
			
			var inputs = $(this).parents("form").eq(0).find(':input:not([readonly="readonly"])');
			var idx = inputs.index(this);
			//alert(inputs[idx].name);
			if(inputs[idx].name=='BGAMOUNT')
				idx++;
				
			if (idx == inputs.length - 1) {
				inputs[0].select()
			} else {
				
				inputs[idx + 1].focus(); //  handles submit buttons
				inputs[idx + 1].select();
			}	
			
		}
			
		 $('input').attr('autocomplete', 'off');
		 
		 if ($('.error-box').length){
		 	
			setTimeout('$(\'.error-box\').fadeOut(500); ',1000);
		 }
		 
		$('.float').live('click',function (e) {
			if($(this).val()=='0.00'){
				$(this).val('');
			}
		})
		$('.float').live('blur',function (e) {
				
				if($(this).val()!='' && !isNaN(parseFloat($(this).val())) ){
					$(this).val( parseFloat($(this).val()).toFixed(2));
				}else{
					$(this).val('0.00');
				}
				 
 		});
		 
		function forNum(val){
			 
				var tmp = parseFloat(val);
				return tmp.toFixed(2);
			 
	  }
	  
	  function okalert(title,description){
			
			$.dW.createDialog(title, description, {
					buttons: {
						"Ok" : function(){
							 $.dW.destroyDialogs();

							
							} 
						},
					modal: true

			});  
		  
	  }
	
	$('#popup-notifications').live("click", function() {
		$.post('includes/common.php', {action:'notifications'}, function(data) {
			$.dW.createDialog("Notifications", data, {
				buttons: {
					"Ok" : function(){
						$.dW.destroyDialogs();
					} 
				},
				modal: true, 
				width: 440
			});
		});
	}); 
	
	
	var lastHash = '';
	var intervalHashCheck = setInterval(function() {
		var hash = location.hash.replace('#', '');
		
		if(hash == lastHash)
			return false;
		
		lastHash = hash;
		
		if(hash.substr(0, 13) == 'extendproject')
		{
			var projectID = hash.replace('extendproject-', '');
			
			if(isNaN(projectID))
				return false;
			
			var params = {
				project_id: projectID
			};
			
			$('#ajax_body').ajaxloader();
			$.post('includes/projects_ajax.php', {params: params, action:'extend-project-form'}, function(data) {
				$('#ajax_body').ajaxloader('hide');
				
				window.location.hash = '';
				$.dW.destroyDialogs();
				$.dW.createDialog("Project end date reached", data, {
					buttons: {
						"Extend Project" : function() {
							var params = {
								project_id: projectID,
								new_end_date: $('#project_extend_date').val()
							};
							
							$.post('includes/projects_ajax.php', {params: params, action:'extend-project-submit'}, function(data) {
								$.dW.alert('Project end date has been updated');
							});
							
							$.dW.destroyDialogs();
						},
						"Close Project": function() {
							$.post('includes/projects_ajax.php', {params: params, action:'close-project'}, function(data) {
								$.dW.alert('The project has been closed');
							});
							
							$.dW.destroyDialogs();
						},
						"Cancel": function() {
							$.dW.destroyDialogs();
						}
					},
					modal: true,
					width: 600
				});
				
				$('#project_extend_date').datepicker({
					dateFormat: 'dd/mm/yy',
					minDate: new Date()
				});
				
				$('#project_extend_date').blur();
				});
				
				
				
			}
	}, 200);


});


var overlay =
{
	overlay: null,

	create: function()
	{
		if(this.overlay)
			return false;
		
		this.overlay = document.createElement('div');
		this.overlay.id = 'overlay';
		this.overlay.style.display = 'none';
		
		document.body.appendChild(this.overlay);
	},

	resize: function()
	{
		if(!this.overlay)
			this.create();
		
		var size = getPageSize();

		this.overlay.style.width = (size['width'] - 0)+'px';
		this.overlay.style.height = size['height']+'px';

		return this;
	},

	show: function()
	{
		if(!this.overlay)
			this.create();
		
		this.resize();

		this.overlay.style.display = 'block';

		this.overlay.onclick = function() { overlay.hide(); }

		return this;
	},

	loading: function()
	{
		this.setOnclick(function() { return false; });

		return this;
	},

	hide: function()
	{
		this.overlay.style.display = 'none';
		
		return this;
	},

	setOnclick: function(onclick)
	{
		this.overlay.onclick = onclick;

		return this;
	},

	close: function()
	{
		if(!this.overlay)
			return this;
		
		this.overlay.onclick();
		this.hide();
		
		return this;
	},
	
	setClass: function(className)
	{
		this.overlay.className = className;
	}
}

window.onresize = function()
{
	overlay.resize();
}

function getPageSize()
{
	var size = [];
	
	var d = document.documentElement;
	var b = document.body;
	var who = d.offsetHeight ? d : b;
	
	size['width'] = Math.max(who.scrollWidth, who.offsetWidth);
	size['height'] = Math.max(who.scrollHeight, who.offsetHeight);
	
	return size;
}

function popupShow(id)
{
	$('#'+id).show();
	
	overlay.show().setOnclick(function() { $('#'+id).fadeOut(500); overlay.hide(); });
}

function userResetPassword()
{
	var error = null;
	
	if(!$('#password-new').val())
	{
		$('#password-new').addClass('error').focus();
		
		error = 'Please enter password.';
	}
	
	var regEx = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){6,}$/;
	var regEx2 = /(?=.*[A-Z])/;
	
	if(!regEx.test($('#password-new').val()) || !regEx2.test($('#password-new').val()))
	{
		$('#password-new').addClass('error');
		
		if(!error)
		{
			$('#password-new').focus();
			error = 'Password needs to be 6 characters long and must include a number and upper case letter';
		}
	}
	
	if(!$('#password-confirm').val())
	{
		$('#password-confirm').addClass('error')
		
		if(!error)
		{
			$('#password-confirm').focus();
			error = 'Please confirm password.';
		}
	}
	
	if($('#password-new').val() != $('#password-confirm').val())
	{
		$('#password-confirm').addClass('error');
		
		if(!error)
		{
			$('#password-confirm').focus();
			error = 'Passwords don\'t match.';
		}
	}
	
	if(error)
	{
		$('#reset-pass-error').show().html(error);
		
		return false;
	}
	
	$('#PASSWORD').val($('#password-new').val());
	$('#CPASSWORD').val($('#password-new').val());
	$('#frmEdit').submit();
	
	overlay.close();
}

function logoDelete()
{
	$.dW.createDialog("System message", "Are you sure you want to delete the logo?", {
		buttons: {
			"Confirm" : function() {
				window.location = '?deletelogo';
			},
			"Cancel": function() {
				 $.dW.destroyDialogs();
				 
				 return false;
			}
		},
		modal: true 
	});
}

function overrideEmailSet(email, name)
{
	if(email.indexOf('(') != -1)
	{
		var tmp = email.substr(0, email.indexOf('(')-1);
	}
	
	$('#OVERRIDEEMAILTEMP').val(email);
	
	var text = name ? name : email;
	
	$('#override-email-name').html(text);
}

function authorizeEmailSet(email, name)
{
	if(email.indexOf('(') != -1)
	{
		var tmp = email.substr(0, email.indexOf('(')-1);
	}
	
	$('#AUTHORIZEEMAILTEMP').val(email);
	
	var text = name ? name : email;
	
	$('#authorize-email-name').html(text);
}

function formPayingInSlip(form)
{
	if(!form.slip.value && !form.old_slip.value)
	{
		form.slip.focus();
		
		return false;
	}
	
	return true;
}

function popupHelpShow(id, el)
{
	var position = $('#btn-help-'+id).offset();
	var left = Math.floor(position['left']) + 28;
	var top = Math.floor(position['top']);
	
	$('#ajax_body').ajaxloader('show');
	
	$.post('includes/help.php', {params: {id: id}, action:'get'}, function(data) 
	{
		$('#ajax_body').ajaxloader('hide');
		
		$('#popup-help').fadeIn(500).css('left', left).css('top', top);
		$('#popup-help-contents').html(data);
	});
}

function popupHelpActivate(id)
{
	popupHelpHide();
	document.getElementById('btn-help-'+id).scrollIntoView();
	setTimeout(function() { popupHelpShow(id); }, 500);
}

function popupHelpHide()
{
	$('#popup-help-contents').html('');
	$('#popup-help').fadeOut(500);
}

function readNotification(id, url)
{
	if(url.substr(0, 1) == '#')
		window.location = url;
	else
		window.location = 'r.php?url='+url;
	//$.post('includes/notifications.php', {params: {id: id}, action:'read'}, function(data) {
		//window.location = 'r.php?url='+url;
	//});
}

function sendMessage(userid, replyto)
{
	$('#tab5link').click();
	$('#USERID').val(userid);
	$('#replyto').val(replyto ? replyto : 0);
}

function deleteMessage(messageid)
{
	$.dW.createDialog("System message", "Are you sure you want to delete this message?", {
		buttons: {
			"Confirm" : function() {
				$.post('includes/messages.php', {params: {id: messageid}, action:'delete'}, function(data) 
				{
					$('#message-box-'+messageid).hide();
				});
			},
			"Cancel": function() {
				 $.dW.destroyDialogs();
				 
				 return false;
			}
		},
		modal: true 
	});
}

function confirmDiscard(url)
{
	$.dW.createDialog("System message", "Are you sure you want to discard changes?", {
		buttons: {
			"Confirm" : function() {
				window.location = url;
			},
			"Cancel": function() {
				 $.dW.destroyDialogs();
			}
		},
		modal: true 
	});
	
	return true;
}

if(typeof String.prototype.trim !== 'function') {
	String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, ''); 
	};
}

function datepickerToDate(dp)
{
	var tmp = dp.split('/');
	var d = new Date();
	
	d.setFullYear(tmp[2]);
	d.setMonth(tmp[1]-1);
	d.setDate(tmp[0]);
	d.setHours(0);
	d.setMinutes(0);
	d.setSeconds(0);
	
	return d;
}

function dateDiffInDays(date1, date2)
{
    var ONE_DAY = 1000 * 60 * 60 * 24;
	
    var date1_ms = date1.getTime();
    var date2_ms = date2.getTime();
    
    var difference_ms = Math.abs(date1_ms - date2_ms);
	
    return Math.round(difference_ms/ONE_DAY);
}

function popupChart(id, param)
{
	var params = {
		chart_id: id, 
		param: param
	};
	
	$.post('includes/common.php', {action:'popup-chart', params: params}, function(data) {
		$.dW.createDialog("Dashboard", '<div id="popup-chart"></div>', {
			buttons: {
				"Ok" : function(){
					$.dW.destroyDialogs();
				} 
			},
			modal: true, 
			width: 460,
			height: 440
		});
		
		//popup-chart
		var chart_popup = new FusionCharts( "fusioncharts/MSCombi2D.swf", "popupChart", "420", "300", "0" );
		chart_popup.setXMLUrl("dashboard/"+data);
		chart_popup.render("popup-chart");
	});
}
