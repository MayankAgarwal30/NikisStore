(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(function() {
		var agent_id = moc_obj.agent_id, cust_id = '';
		var getmember_time = 5;
		var CurrentChatInterval = '';
		setCookie('moc_current_chat_users', '');
		var GetNewCustomer = function(){
			$.ajax({
				url  :  moc_obj.ajax_url,
				data : { 'action' : 'getnewcustomer' },
				type : 'post',
				success : function(result){
					var results = jQuery.parseJSON(result); 
					//console.log(results);
					if(results.status){
						var html = '';
						var customers = results.customers;
						for(var i=0;i<customers.length;i++){
							html = new_user(customers[i]);
							$('.mca_user_list ul').prepend(html);
						}
						getmember_time = 5;
					}else{
						getmember_time += 5;
					}
					if(getmember_time >= 60){
						getmember_time = 5;
					}
					
					setTimeout(GetNewCustomer, getmember_time * 1000);
				}
			});	
		};
		if($('.mca_chat_wrapper_new_c').length > 0){
			setTimeout(GetNewCustomer, getmember_time * 1000);
		}
		
		var GetChatHistory = function(cust_id, agent_id){
			$.ajax({
				url  :  moc_obj.ajax_url,
				data : { 'action' : 'getchathistory', 'user_to' : cust_id, 'user_from' : agent_id },
				type : 'post',
				success : function(result){
					var results = jQuery.parseJSON(result); 
					//console.log(results);
					if(results.status){
						var html = '', nm = '', msg = '', type = '', lastmsg_id = '';
						var mChat = results.data;
						for(var i=0;i<mChat.length;i++){
							nm = results.user_name[mChat[i].user_from];
							msg = mChat[i].msg;
							type = mChat[i].user_from == agent_id ? 'sender' : '';
							lastmsg_id = mChat[i].msg_id;
							html = chat(nm, msg, type, lastmsg_id, cust_id);
							$('.moc_chat_win .moc_chat_inner.moc_'+cust_id+' .moc_chat_content').prepend(html);
							
							nm = '', msg = '', type = '';
						}
						if(lastmsg_id != ''){
							var cnm = 'moc_current_chat_users';
							var current_user_chat = getCookie( cnm );
							var Objectdata = { 'cust_id' : cust_id, 'lastmsg_id' : lastmsg_id };
							var o = [];
							var bool = true;
							if(current_user_chat != ''){
								var r = JSON.parse( current_user_chat );
								for(var i=0;i<r.length;i++){
									if(r[i].cust_id == cust_id){
										bool = false;
										return;
									}
								}
								if(bool){
									r.push(Objectdata);
									setCookie(cnm, JSON.stringify(r));
								}
							}else{
								o.push(Objectdata);
								setCookie( cnm, JSON.stringify( o ) );
							}
						}
					}
				}
			});	
		};
		
		var CurrentChat = function(){
			var cnm = 'moc_current_chat_users';
			var current_user_chat = getCookie( cnm );
			var r = JSON.parse( current_user_chat );
			//console.log(r);
			for(var i=0;i<r.length;i++){
				var lastid = $('.moc_chat_win .moc_chat_inner.moc_'+r[i].cust_id+' .moc_type_message').data('lastid');
				var cust_id = $('.moc_chat_win .moc_chat_inner.moc_'+r[i].cust_id+' .moc_type_message').data('cust_id');
				var agent_id = $('.moc_chat_win .moc_chat_inner.moc_'+r[i].cust_id+' .moc_type_message').data('agent_id');
				//alert(lastid+'--'+cust_id+'---'+agent_id);
				var is_type = 0;
				if($('.moc_chat_win .moc_chat_inner.moc_'+r[i].cust_id+'  .moc_type_message').val()!=''){
					var is_type = 1;
				}
				/*if(r[i].lastmsg_id != lastid){
					return;
				}*/
				$.ajax({
					url  :  moc_obj.ajax_url,
					data : { 'action' : 'current_chat', 'lastid' : lastid, 'cust_id' : cust_id, 'agent_id' : agent_id, 'is_type' : is_type, 'index' : i },
					type : 'post',
					success : function(result){
						var results = jQuery.parseJSON(result); 
						if(results.status){
							//console.log(results);
							var nm = get_first_letter(results.cust_id);
							var html = '', msg = '', type = '';
							var mChat = results.data;
							var cc = getCookie( cnm );
							var rc = JSON.parse( cc );
							for(var i=0;i<mChat.length;i++){
								msg = mChat[i].msg;
								html = chat(nm, msg, type, mChat[i].msg_id,results.cust_id);
								rc[results.index].lastmsg_id = mChat[i].msg_id;
								$('.moc_chat_win .moc_chat_inner.moc_'+results.cust_id+' .moc_chat_content').prepend(html);
							}
							if(results.is_type === '1'){
								var str = $('.moc_chat_win .moc_chat_inner.moc_'+results.cust_id+' .moc_chat_title').text();
								$('.moc_chat_win .moc_chat_inner.moc_'+results.cust_id+' .moc_user_typing').text(str+' is typing...');							
							}else{
								$('.moc_chat_win .moc_chat_inner.moc_'+results.cust_id+' .moc_user_typing').text('');
							}
							setCookie(cnm, JSON.stringify(rc));
						}
					}
				});	
			}
		};
		
		$('.moc_chat_win').on('keypress', '.moc_type_message', function(e) {
			if(e.which == 13) {
				if($(this).val() != ''){
					var msg = $(this).val();
					var cust_id = $(this).data('cust_id');
					var agent_id = $(this).data('agent_id');
					$(this).val('');
					sendmessage(msg, cust_id, agent_id);
				}
			}
		});
		
		$('.mca_user_list ul').on('click', '.admin_chat_open', function(e){
			e.preventDefault();
			
			if($('.moc_chat_win').find('.moc_'+$(this).data('cust_id')).length == 1){
				$('.moc_chat_win').find('.moc_'+$(this).data('cust_id')).addClass('moc_already_opened');
				var c = $(this).data('cust_id');
				setTimeout(function(){
					$('.moc_chat_win').find('.moc_'+c).removeClass('moc_already_opened');
				},3000);
				return false;
			}
			
			var html = '';
			html = chat_window($(this).data('name'), $(this).data('cust_id'), $(this).data('agent_id'), false);
			$('.moc_chat_win').append(html);
			GetChatHistory($(this).data('cust_id'), $(this).data('agent_id'));
			CurrentChatInterval = setInterval(CurrentChat, 3000);
		});
		
		$('.mca_user_list ul').on('click', '.admin_chat_open_h', function(e){
			e.preventDefault();
			var html = '';
			$('.moc_chat_win').html('');
			$(this).parents('li').find('.moc_chat_win').html(html);
			$(this).parents('li').addClass('moc_h_active');
			html = chat_window($(this).data('name'), $(this).data('cust_id'), $(this).data('agent_id'), true);
			$(this).parents('li').find('.moc_chat_win').append(html);
			GetChatHistory($(this).data('cust_id'), $(this).data('agent_id'));
		});
		
		$('.moc_chat_win').on('click', '.moc_close_window', function(e){
			e.preventDefault();
			var c_id = $(this).data('c_id');
			$(this).parents('.moc_'+c_id).remove();
			if($('.moc_chat_win').find('.moc_chat_inner').length == 0){
				clearInterval(CurrentChatInterval);
			}
		});
		
		function sendmessage(msg, cust_id, agent_id){
			$.ajax({
				url  :  moc_obj.ajax_url,
				data : { 'action' : 'sendmessage', 'user_from' : agent_id, 'user_to' : cust_id, 'user_msg' : msg },
				type : 'post',
				success : function(result){
					var results = jQuery.parseJSON(result); 
					if(results.status){
						var nm = get_first_letter(results.cust_id);
						var html = chat('A', results.msg, 'sender', results.msg_id, results.cust_id);
						$('.moc_chat_win .moc_chat_inner.moc_'+results.cust_id+' .moc_chat_content').prepend(html);
					}
				}
			});	
		}
		
		function new_user(customer){
			var html = '';
			html += '<li class="active">';
				html += '<div class="mca_user">';
					html += '<div class="mca_initials">'+customer.letter+'</div>';
					html += '<div class="mca_user_detail">';
						html += '<h3 class="mca_userName">'+customer.name+'</h3>';
						html += '<p class="mca_userLastMsg">'+customer.lastmsg+'</p>';
					html += '</div>';
					html += '<div class="mca_action">';
						html += '<a href="" class="mca_btn admin_chat_open" data-cust_id="'+customer.user_id+'" data-name="'+customer.name+'" data-agent_id="'+customer.agent_id+'">Chat Now</a>';
					html += '</div>';
				html += '</div>';
			html += '</li>';
			return html;
		}
		
		function chat_window(nm, id, agent_id, h = false){
			var html = '';
			html += '<div class="moc_chat_inner moc_'+id+'">';
				html += '<div class="moc_chat_header">';
					html += '<div class="moc_chat_title">'+nm+'</div>';
					html += '<div class="moc_close_window" data-c_id="'+id+'">X</div>';
				html += '</div>';
				html += '<div class="moc_chat_body">';
					html += '<div class="moc_chat_body_inner">';
						html += '<div class="moc_chat_content">';
						
						html += '</div>';
						html += '<div class="moc_user_typing"></div>';
					html += '</div>';
				html += '</div>';
				if(!h){
					html += '<div class="moc_chat_footer">';
						html += '<div class="moc_reply">';
							html += '<input type="text" data-lastid="" class="moc_type_message" data-cust_id="'+id+'" data-agent_id="'+agent_id+'">';
							html += '<span class="moc_chat_submit"></span>';
						html += '</div>';
					html += '</div>';
				}
				
			html += '</div>';
			
			return html;
		}
		
		function chat(name, msg, type='', msg_id, cust_id){
			var html = '';
			html += '<div class="moc_chat_item '+type+' '+msg_id+'">';
				html += '<div class="moc_message">';
					html += '<div class="moc_chat_user">';
						html += '<label>'+name+'</label>';
					html += '</div>';
					html += '<div class="moc_chat_text">';
						html += '<p>'+msg+'</p>';
					html += '</div>';
				html += '</div>';
			html += '</div>';
			$('.moc_chat_win .moc_chat_inner.moc_'+cust_id+' .moc_type_message').data('lastid', msg_id);
			return html;
		}
		
		function get_first_letter(cust_id){
			var str = $('.moc_chat_win .moc_chat_inner.moc_'+cust_id+' .moc_chat_title').text();
			var $acronym = "";
			if(str != ''){
				var $words = str.split(' ');
			
				for (var i=0; i< $words.length;i++) {
					$acronym += $words[i][0];
				}
			}
			return $acronym;
		}
		
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function checkCookie() {
			var user = getCookie("username");
			if (user != "") {
				alert("Welcome again " + user);
			} else {
				user = prompt("Please enter your name:", "");
				if (user != "" && user != null) {
					setCookie("username", user, 365);
				}
			}
		}
		
	});
})( jQuery );
