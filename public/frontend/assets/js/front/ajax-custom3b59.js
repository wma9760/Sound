"use strict";

$(function(){
    var dynamicKeys = JSON.parse(dynamicName);
    
    $(window).on('load', function(){
        if($('.grid').length){
            $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: 20,
                    gutter: $('.grid').data('gutter'),
                }
            });
        }
    });

    if(isInspect == 1){
        $("body").on("keydown", function (e) {
            if(e.which === 123 || (e.ctrlKey && e.shiftKey && e.which == 73))
                return false;                 
        }); 

        $("body").on("bind", "contextmenu", function (e) {
            e.preventDefault(); 
        }); 
    }

    if(isRightClick == 1){
        $("body").on("bind", "contextmenu", function (e) {
            e.preventDefault(); 
        }); 
    }

    if($('[data-star="rating"]').length){
        $('[data-star="rating"]').each(function(){
            $("."+$(this).attr('class')).starRating({
                initialRating: $(this).attr('data-rating'),
                readOnly: true,
                starSize : 25
            });
        })
    }

    if($('.ms_payment_section').length){
        new Card({
            form: document.querySelector('form.card_Detail'),
            container: '.card-wrapper'
        });
    }

    if($(".rating").length){
        $(".rating").starRating({
            initialRating : 0,
            disableAfterRate : false,
            emptyColor : 'lightgray',
            hoverColor : '#2ec8e6',
            ratedColors : ['#2ec8e6','#2ec8e6','#2ec8e6','#2ec8e6','#2ec8e6'],
            strokeColor : 'black',
            strokeWidth : 9,
            callback : function(currentRating, $el){
                $('.live-rating').val(currentRating)
            }
        });
    }


    $(".addToFavourite").on('click', function(){
        var favid = $(this).attr('data-favourite');
        var type = $(this).attr('data-type');
        var cur_ev = $(this);
        if(type == 'album')
            var data = 'albumid=';
        else if(type == 'artist')
            var data = 'artistid=';
        else if(type == 'audio')
            var data = 'audioid=';
        var formdata =data+favid;
        if(typeof favid != 'undefined'){
            $(".ms_ajax_loader").show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: baseURL+'/add_to_favourite/'+type,
                data: formdata,
                success: function(response){
                    var result = JSON.parse(response);
                    $(".ms_ajax_loader").hide();
                    if( result.status ){
                        if(result.action == 'removed'){
                            toastr.success(result.msg);
                            $(cur_ev).find('span.icon').removeClass('icon_fav_add');
                            $(cur_ev).find('span.icon').addClass('icon_fav');
                        }else{
                            toastr.success(result.msg);
                            $(cur_ev).find('span.icon').removeClass('icon_fav');
                            $(cur_ev).find('span.icon').addClass('icon_fav_add');
                        }
                    }else{
                        toastr.error(result.msg);
                    }
                }
            });
        }
    });

    $('[name="apply_coupon"]').on('change', function(){
        if($(this).val() == 1){
            $('#applyCouponForm').removeClass('d-none');
            $('#couponCode').addClass('require');
        }else{
            $('#applyCouponForm').addClass('d-none');
            $('#couponCode').removeClass('require');
        }
    });

    $(".language_filter").on('click', function(){
		var lang = [];
		$(".lang_filter:checked").each(function() {
            lang.push(this.value);
        });
        var lang_data = 'filter_lang='+lang;
        if(lang.length){
            $(".language_filter").hide();
            $(".ms_ajax_loader").show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: baseURL+'/filter_language',
                data: lang_data,
                success: function(response){
                    localStorage.removeItem("jp_playlist")
                    $(".ms_ajax_loader").hide();
                    location.reload();
                }
            });
        }else{
            toastr.error(dynamicKeys.select_lang);
        }
    });
    
    $(document).on('click','.likeDislikeAudio',function(){
        var songId = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var _this = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			type: 'post',
			url: baseURL+'/like_dislike_audio',
			data: {'id':songId, 'type':type},
			success: function(response){
                var resp = JSON.parse(response);
		        if(resp.status){
                    if(resp.resp.hasOwnProperty('like') && resp.resp.hasOwnProperty('dislike')){
                        if(resp.resp.dislike == 1 && resp.resp.like == 0){
                            _this.closest('span').find('[data-type="2"]').css('color','red');
                            _this.closest('span').find('[data-type="1"]').css('color','white');
                        }else{
                            _this.closest('span').find('[data-type="1"]').css('color','#3bc8e7');
                            _this.closest('span').find('[data-type="2"]').css('color','white');
                        }
                    }else if(resp.resp.hasOwnProperty('like')){
                        if(resp.resp.like)
                            _this.css('color','#3bc8e7');
                        else
                            _this.css('color','white');
                    }else if(resp.resp.hasOwnProperty('dislike')){
                        if(resp.resp.dislike)
                            _this.css('color','red');
                        else
                            _this.css('color','white');
                    }
                }else{
                    toastr.error(resp.msg)
                }
            }
		});
    })

    $(".download_track").on('click', function(){ 
		var id = $(this).attr('data-musicid');

		var formdata ='musicid='+id;
        $(".ms_ajax_loader").show();
        setTimeout(function(){
            $(".ms_ajax_loader").hide();
        }, 1500)
		if(id){
			$.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				type: 'post',
				url: baseURL+'/download_track',
				data: formdata,
				success: function(response){
					var result = JSON.parse(response);
                    $(".ms_ajax_loader").hide();
					if( result.status && result.mp3_uri != '' ) {
                        var link = document.createElement("a");
                        link.href = result.mp3_uri;
                        link.download = result.mp3_name;
                        link.click();
                    }else{
						if(result.status == 'false' && result.plan_page != ''){
						    window.location.href = result.plan_page;
						}
					}
				}
            });
        }		
    });
    
    $(".create_playlist").on('click' , function(){
    	$("#add_in_playlist_modal").modal("hide");
    	$("#create_playlist_modal").modal("show");
    });

    $(".create_new_playlist").on('click', function(){
        var name = $.trim($("#playlist_name").val());
		if(name == ''){
			toastr.error(dynamicKeys.playlist_err);
		}else{
            $(".ms_ajax_loader").show();
			var formdata ='playlist_name='+name;
        	$(".create_new_playlist").prop('disabled', true);
			
			$.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				type: 'post',
				url: baseURL+'/create_playlist',
				data: formdata,
				success: function(response){
                    $(".create_new_playlist").prop('disabled', false);
					var result = JSON.parse(response);
					if( result.status ) {
						location.reload();
						toastr.success(result.msg);
					}else{
						toastr.error(result.msg);
						$(".ms_ajax_loader").hide();
						$(".create_new_playlist").show();
					}
				}
			});
		}
    });
    
    $(".ms_add_playlist").on('click', function(){
    	var music = $(this).attr("data-musicid");
    	$("#ms_share_music_modal_id").modal("hide");
    	$("#create_playlist_modal").modal("hide");
    	$('#add_in_playlist_modal select[name="playlistname"]').attr("data-musicid", music);
    	$("#add_in_playlist_modal").modal("show");
    });

    $(".ms_add_in_playlist").on('click', function(){
		var playlistid = $('#add_in_playlist_modal select[name="playlistname"]').val();
		var musicid = $('#add_in_playlist_modal select[name="playlistname"]').attr('data-musicid');
        if(playlistid == ''){
            toastr.error(dynamicKeys.select_playlist);
        }else{
            if(typeof musicid != 'undefined'){
                var formdata ='playlistid='+playlistid+'&musicid='+musicid;
            
                $(".ms_add_in_playlist").hide();
                $(".ms_ajax_loader").show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseURL+'/add_in_playlist',
                    data: formdata,
                    success: function(response){
                        var result = JSON.parse(response);
                        if( result.status == 1 ) {
                            $("#add_in_playlist_modal").modal("hide");
                            toastr.success(result.msg);
                        }else{
                            toastr.error(result.msg);
                        }
                        $(".ms_ajax_loader").hide();
                        $(".ms_add_in_playlist").show();
                    }
                });
            }else{
                toastr.error(dynamicKeys.no_song);   
            }
        }		
    });
    
    $(".ms_remove_user_playlist").on('click', function(){
        deletePopup().then((result) => {
            if (result.value) {
                var playlist = $(this).attr('data-list-id');
                var formdata ='playlistid='+playlist;
                
                $(".ms_ajax_loader").show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseURL+'/remove_playlist',
                    data: formdata,
                    success: function(response){
                        var result = JSON.parse(response);
                        $(".ms_ajax_loader").hide();
                        if( result.status === 1 ) {
                            toastr.success(result.msg);
                            location.reload();
                        }else{
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        })
	});

	$('.ms_share_music').on('click', function(){
        var share_uri = $(this).attr('data-shareuri');
    	var share_title = $(this).attr('data-sharename');
    	$("#add_in_playlist_modal").modal("hide");
    	$("#create_playlist_modal").modal("hide");
    	if(typeof share_uri != 'undefined'){
            if (window.innerWidth <= 640) {
                $(".ms_share_facebook").attr('href', 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(share_uri));
                $(".ms_share_linkedin").attr('href', 'https://www.linkedin.com/sharing/share-offsite/?url='+encodeURIComponent(share_uri));
                $(".ms_share_twitter").attr('href', 'https://twitter.com/intent/tweet?text='+share_title+'&amp;url='+encodeURIComponent(share_uri)+'&amp;via=Miraculous');
                $(".ms_share_googleplus").attr('href', 'https://plus.google.com/share?url='+encodeURIComponent(share_uri));
            }
            else {
                var width = 200;
                var height = 150;
                $(".ms_share_facebook").attr('onclick', "window.open('https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(share_uri)+"', 'Share', width='" + width + "', height='" + height + "' )");
                $(".ms_share_linkedin").attr('onclick', "window.open('https://www.linkedin.com/sharing/share-offsite/?url="+encodeURIComponent(share_uri)+"', 'Share', width='" + width + "', height='" + height + "' )");
                $(".ms_share_twitter").attr('onclick', "window.open('https://twitter.com/intent/tweet?text="+share_title+"&url="+encodeURIComponent(share_uri)+"&via=Miraculous' , 'Share', width='" + width + "', height='" + height + "' )");
                $(".ms_share_googleplus").attr('onclick', "window.open('https://plus.google.com/share?url="+encodeURIComponent(share_uri)+"', 'Share', width='" + width + "', height='" + height + "' )");
            }
            $("#ms_share_music_modal_id").modal("show");
        }
    	
    });

    $(".remove_user_playlist_music").on('click', function(){
        deletePopup().then((result) => {
            if (result.value) {
                var sid = $(this).attr('musicid');
                var listid = $(this).attr('data-list-id');
                var formdata ='songid='+sid+'&listid='+listid;
    
                $(".ms_ajax_loader").show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseURL+'/playlist/remove_track',
                    data: formdata,
                    success: function(response){
                        var result = JSON.parse(response);
                        $(".ms_ajax_loader").hide();
                        if( result.status ) {
                            $("a[data-musicid='"+sid+"']").parent().parent('ul').slideUp("slow", function() { $(this).remove();});
                            toastr.success(result.msg);
                        }else{
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        })
    });
    
    $( "#change_pass" ).on('click',function() {
        if($('.change_password_slide').css('display') == 'block'){
            $( ".change_password_slide" ).slideUp( "slow" );
            $('#userPassword, #confirmPassword').removeClass('require');
        }else{
            $( ".change_password_slide" ).slideDown( "slow" );
            $('#userPassword, #confirmPassword').addClass('require');
        }
        $("#userPassword, #confirmPassword").val("");
    });

    $('#updateUserProfile').on('click', function(){
        var name = $('#user_name').val().trim();
        var password = $('#userPassword').val().trim();
        var cnfPassword = $('#confirmPassword').val().trim();

        if(name == ''){
            toastr.error(dynamicKeys.required_fields);
            $('#user_name').focus();
        }else{
            if(password === '' && cnfPassword !== ''){
                toastr.error(dynamicKeys.pass_err);
                $('#userPassword').focus();
            }else if(cnfPassword === '' && password !== ''){
                toastr.error(dynamicKeys.cnf_pass_err);
                $('#confirmPassword').focus();
            }else if(password != cnfPassword){
                toastr.error(dynamicKeys.cnf_mismatch);
                $('#confirmPassword').focus();
            }else{
                $(".ms_ajax_loader").show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseURL+'/update_profile/',
                    data : new FormData($('#updateUserForm')[0]),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        var result = JSON.parse(response);
                        $(".ms_ajax_loader").hide();
                        console.log(result);
                        if( result.status ){
                           
                        }else{
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        }
    })

    $('#basicImage').on('change',function(e){
        if($(this)[0].files.length){
            var file = $(this)[0].files[0];
            var ext = (typeof $(this).attr('data-ext') != 'undefined') ? eval($(this).attr('data-ext')) : ['jpg','jpeg','png','svg'];
            
            if(jQuery.inArray(file.name.split('.').pop().toLowerCase(), ext) == -1){
                toastr.error(dynamicKeys.only_allowed+ext.toString()+dynamicKeys.files);
                return false;
            }else{
                obUrl = URL.createObjectURL(file);
                $('#showUserImage').attr('src', obUrl)
               
            }
        }
    })
    

    $('#purchasePlan').on('click', function(){
        if(checkUserId != ''){
            var payment = $('#startPayment').val().trim();
            if(payment == ''){
                return;
            }else{
                var amnt = $('#planDetail').data('amnt');
                var plan_id = $('#planDetail').data('id');
                if(payment == 'paypal' || payment == 'instamojo'){
                    if(payment == 'paypal'){
                        $('#paypal-form').attr('action', baseURL+'/paypal');
                    }else if(payment == 'instamojo'){
                        $('#paypal-form').attr('action', baseURL+'/payinstamojo');
                    }
                    $('#paypal-form').find('[name="plan_id"]').val(plan_id);
                    $('#paypal-form').find('[name="amount"]').val(amnt);
                    $('#paypal-form')[0].submit();
                }
                else if(payment == 'paystack'){
                    $('#paystack-form').find('[name="email"]').val($('#userEmail').val());
                    $('#paystack-form').find('[name="orderID"]').val(Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15))
                    $('#paystack-form').find('[name="amount"]').val(amnt);
                    var arr = {'user_id' : $('#userID').val(), 'plan_id' : plan_id}
                    $('#paystack-form').find('#paystackmetadata').val(JSON.stringify(arr));
                    $('#paystack-form')[0].submit();
                    
                }
                else if(payment == 'paytm' || payment == 'instamojo'){
                    $('#paytm-form').find('[name="plan_id"]').val(plan_id);
                    $('#paytm-form').find('[name="amount"]').val(amnt);
                    $('#paytm-form')[0].submit();
                }
                else if(payment == 'instamojo'){
                    $('')
                }
            }
        }else{
            toastr.error(dynamicKeys.login_err);
        }
    })

    $('.paymentMethod').on('change', function(){
        var payment = $(this).data('name');
        var disc = $('#disAmt').data('discount');
        $('.ms_profile_box').find('form').not('#applyCouponForm').addClass('d-none');
        $('.ms_card_wrapper, .braintree_card').addClass('d-none');
        if(payment == 'paypal')
            $('#paypal-form').removeClass('d-none');
        else if(payment == 'payumoney'){
            $('#payu-form').removeClass('d-none');
        }
        else if(payment == 'paytm'){
            $('#paytm-form').removeClass('d-none');
        }
        else if(payment == 'braintree'){
            $('.braintree_card').removeClass('d-none');
            $('#bt-form').removeClass('d-none');
        }
        else if(payment == 'instamojo'){
           $('.instamojo-form').removeClass('d-none');
        }
        else if(payment == 'paystack'){
            $('#paystack-form').removeClass('d-none');
        }
        else if(payment == 'razorpay'){
            if(typeof disc == 'undefined'){
                $('.razorpay-form').removeClass('d-none');
                $('#razorpayForm').addClass('d-none');
            }else{
                $('.razorpay-form').addClass('d-none');
                $('#razorpayForm').removeClass('d-none');
            }
        }
        else if(payment == 'stripe'){
            $('.ms_card_wrapper').removeClass('d-none');
            $('.card_Detail').removeClass('d-none');
        }
        else if(payment == 'manual_pay'){
            $('#manualpay-form').removeClass('d-none');
        }
    })

    $('#razorpay_submit').on('click', function(){
        if(checkUserId != ''){
            var amnt = $('#disAmt').data('newamount');
            var disc = $('#disAmt').data('discount');
            var planId = $('[name="plan_id"]').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: baseURL+'/razorpay/proceed',
                data : {'amount' : amnt, 'plan_id' : planId, 'discount' : disc},
                success: function(response){
                    var result = JSON.parse(response);
                    if(result.status == 1){
                        var options = {
                            "key": result.data.razorpay_key,
                            "amount": result.data.amount, 
                            "currency": "INR",
                            "name": result.data.name,
                            "description": result.data.description,
                            "image": result.data.image,
                            "handler": function (response){
                                console.log(response)
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: 'post',
                                    url: baseURL+'/razorpay/payment',
                                    data : {'plan_id' : planId, 'razorpay_payment_id' : response.razorpay_payment_id, 'is_ajax' : 1},
                                    success: function(response){
                                        var res = JSON.parse(response);
                                        if(res.status){
                                            toastr.success(res.msg);
                                        }else{
                                            toastr.error(res.msg);
                                        }
                                        location.href = baseURL+'/payment-single/'+res.plan_id;
                                    }
                                })
                            },
                            "prefill": {
                                "name": result.data.name,
                                "email": result.data.email,
                                "contact": '91'+result.data.contact
                            },
                            "theme": {
                                "color": result.data.color
                            }
                        };
                        new Razorpay(options).open();
                    }else{
                        
                        toastr.error(result.msg);
                    }
                }
            })
        }else{
            toastr.error(dynamicKeys.login_err);
        }
    })

    $('#saveCoupon').on('click', function(){
        if(checkUserId != ''){
            var couponCode = $('#couponCode').val().trim();
            if(couponCode == ''){
                toastr.error(dynamicKeys.coupon_err);
                $('#couponCode').focus();
            }else{
                var url = $(this).closest('form').attr('action'); 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    data: {'coupon_code' : couponCode},
                    success: function(response){
                        var result = JSON.parse(response);
                        $(".ms_ajax_loader").hide();
                        if( result.status ){
                            $('.razorpayForm').html(result.formHtml);
                            $('#couponDis').html('-'+$('#cur').val()+result.dis_amount);
                            var amt = parseFloat($('#amountVal').val()) - parseFloat(result.dis_amount);
                            $('#subTtl').html($('#cur').val()+amt);
                            $('.discountApplied').val(result.dis_amount);
                            
                            var metadata = $('#paystack-form #paystackmetadata').val();
                            
                            var paystack = (typeof metadata != 'undefined' ? JSON.parse(metadata) : {});
                            paystack.discountApplied = result.dis_amount;
                            $('#paystack-form #paystackmetadata').val(JSON.stringify(paystack));
                           
                            if($('#taxApplied').val() != 0){
                                var appliedTax = parseInt(amt)*parseInt($('#taxApplied').val())/100;
                                $('#taxAmount').html($('#cur').val()+appliedTax);
                                var totalAmt = parseFloat(amt) + parseFloat(appliedTax);
                            }else{
                                var totalAmt = amt;
                            }
                            
                            $('#totalAmt').html($('#cur').val()+totalAmt);

                            $('.payableAmount').val(totalAmt);

                            $('#disAmt').attr({'data-discount' : result.dis_amount, 'data-newamount' : result.amount});
                            if($('[data-name="razorpay"]').is(':checked') == true && result.dis_amount != ''){
                                $('.razorpay-form').addClass('d-none');
                                $('#razorpayForm').removeClass('d-none');
                            }
                            toastr.success(result.msg);                        
                        }else{
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        }else{
            toastr.error(dynamicKeys.login_err);
        }
    });
    

    $(document).on('keyup', '#search_value', (e) => {
        if(e.keyCode == 13){
            $('.searchData').trigger('click');
        }
    })
    $('.searchData').on('click', function(){
        var searchVal = $('#search_value').val().trim();
        if(searchVal == ''){
            toastr.error(dynamicKeys.search_err);
        }else{
            location.href = baseURL+'/search/'+searchVal;
        }
    })

    $('#userCurr').on('change', function(){
        var id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            url: baseURL+'/changeCurrency/'+id,
            
            success: function(response){
                $(".ms_ajax_loader").hide();
                setTimeout(function(){
                    location.reload();                
                },100)
            }
        });     
    })

    function deletePopup(param=''){
        return Swal.fire({
            title : (param.title) ? param.title : dynamicKeys.are_u_sure,
            text: (param.text) ? param.text : dynamicKeys.delete_records,
            showCancelButton: true,
            confirmButtonText: (param.cnfButton) ? param.cnfButton : dynamicKeys.delete,
            showCloseButton: true
        });
    }
})
