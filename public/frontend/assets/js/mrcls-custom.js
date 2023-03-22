"use strict";

$(function(){
    dynamicName = JSON.parse(dynamicName);
    $('[data-toggle="tooltip"]').tooltip();
    toastr.clear();
    toastr.options = {
		"debug": false,
		"positionClass": "toast-top-right",
		"onclick": null,
		"fadeIn": 300,
		"fadeOut": 1000,
		"timeOut": 5000,
		"extendedTimeOut": 1000, 
		"closeButton":true,
		"closeEasing":'swing'
    }    

    if($(".rating").length){
        $(".rating").starRating({
            initialRating: $('.rating').attr('data-rating'),
            emptyColor: 'lightgray',
            hoverColor: '#506fe4',
            ratedColors: ['#506fe4','#506fe4','#506fe4','#506fe4','#506fe4'],
            strokeColor: 'black',
            activeColor : '#506fe4',
            strokeWidth: 15,
            callback : function(currentRating, $el){
                $('.live-rating').val(currentRating)
            }
        });
    }

    if($('.js-switch-primary').length){
        var primary = document.querySelectorAll('.js-switch-primary');
        primary.forEach(function(html) {
            var switchery = new Switchery(html, { color: '#506fe4' });
        })
    }
    
    if($('.select2WithSearch').length){
        $('.select2WithSearch').select2({
            placeholder: $(this).attr('placeholder')
        });
    }
  
    if($('.multipleSelectWithSearch').length){
        $('.multipleSelectWithSearch').select2({
            placeholder:$(this).attr("placeholder"),
        })
    }
    
    if($('.autoclose-date').length){
        $('.autoclose-date').datepicker({
            language : "en",
            autoclose:true,
            dateFormat: 'yyyy-mm-dd',
        });
    }
    
    if($('#summernote').length){
        $('#summernote').summernote({
            height: 320,
            minHeight: null,
            maxHeight: null,
            focus: true 
        });
    }

    $('.openMenus').on('click', function(){
        $('#g_box').toggle();
    })
    
    $(document).on('change','.basicImage',function(e){
        if($(this)[0].files.length){
            var imageId = $(this).attr('data-image-id');
            $('#'+imageId).val('');
            $('.image_title').html(dynamicName.chooseImage);
            var file = $(this)[0].files[0];
            var _this = $(this);
            var dataId = $(this).attr('data-id');
            var dataLabel = $(this).attr('data-label');
            var ext = (typeof $(this).attr('data-ext') != 'undefined') ? eval($(this).attr('data-ext')) : ['jpg','jpeg','png','svg'];
            var dimension = (typeof $(this).attr('data-dimension') != 'undefined') ? $(this).attr('data-dimension').split('x') : '';
            if(dimension != ''){
                if(jQuery.inArray(file.name.split('.').pop().toLowerCase(), ext) == -1){
                    toastr.error(dynamicName.imgExtErr+ext.toString()+dynamicName.fileType);
                    return false;
                }else{
                    var img = new Image();
                    var obUrl = URL.createObjectURL(file);
                    img.src = obUrl;
                    img.onload = function(){
                        if(typeof dimension == 'object' && this.width != dimension[0] || this.height != dimension[1]){
                            toastr.error(dynamicName.dimensionErr+dimension[0]+'x'+dimension[1]+'.');
                            return false;
                        }else{
                            _this.closest('div').find('#'+imageId).val(file.name);
                            _this.closest('div').find('#'+dataLabel).html(file.name);
                            $('#'+dataId).attr('src', obUrl);
                        }
                    };
                }
            }else{
                if(jQuery.inArray(file.name.split('.').pop().toLowerCase(), ext) == -1){
                    toastr.error(dynamicName.imgExtErr+ext.toString()+dynamicName.fileType);
                }else{
                    _this.closest('div').find('#'+dataLabel).html(file.name);
                    _this.closest('div').find('#'+imageId).val(file.name);
                }
            }
        }else{
            toastr.error(dynamicName.selectImgErr);
            _this.closest('div').find('#'+dataLabel).html(dynamicName.chooseImage)
        }
    })
    
    $(document).on('change','input[name="userImage"]',function(e){
        if($('input[name="userImage"]')[0].files.length){
            var file = $('input[name="userImage"]')[0].files[0];
            var ext = ['jpg','jpeg','png'];
            if(jQuery.inArray(file.name.split('.').pop().toLowerCase(), ext) == -1){
                toastr.error(dynamicName.imgExtErr+ext.toString()+dynamicName.fileType);
            }else{
               $('.image_title').html(file.name)
            }
        }else{
            if($('#image_name').val() != '')
                $('.image_title').html($('#image_name').val());
            else
                $('.image_title').html(dynamicName.chooseImage);
        }
    }) 

    $('#mobile').keypress(function (e) { 
        var regex = new RegExp("^[0-9-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (!regex.test(str)) {
            e.preventDefault();
            return false;
        }else if($(this).attr('max-length') == $.trim($(this).val().length)){
            return false;
        }
    });
    
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye-slash fa-eye");
        var input = $($(this).attr("toggle"));
        if(input.attr("type") == "password") {
          input.attr("type", "text");
        }else{
          input.attr("type", "password");
        }
    });

    if($('.paymentGatewaySetting').length){
        if ($('#razorpay_check').is(':checked')){
            $('#razorpay_box').show('fast');
        }else{
            $('#razorpay_box').hide('fast');
        }
        if ($('#paypal_check').is(':checked')){
            $('#paypal_box').show('fast');
        }else{
            $('#paypal_box').hide('fast');
        }
        if ($('#payu_check').is(':checked')){
            $('#payu_box').show('fast');
        }else{
            $('#payu_box').hide('fast');
        }
        if ($('#bt_check').is(':checked')){
            $('#bt_box').show('fast');
        }else{
            $('#bt_box').hide('fast');
        }
        if ($('#stripe_check').is(':checked')){
            $('#stripe_box').show('fast');
        }else{
            $('#stripe_box').hide('fast');
        }
        if ($('#instamojo_check').is(':checked')){
            $('#instamojo_box').show('fast');
        }else{
            $('#instamojo_box').hide('fast');
        }
        if ($('#paystack_check').is(':checked')){
            $('#paystack_box').show('fast');
        }else{
            $('#paystack_box').hide('fast');
        }  
        if ($('#braintree_check').is(':checked')){
            $('#braintree_box').show('fast');
        }else{
            $('#braintree_box').hide('fast');
        }   
        if ($('#manual_check').is(':checked')){
            $('#manual_box').show('fast');
        }else{
            $('#manual_box').hide('fast');
        }   
    }

    if($('.paypalDonationSetting').length){
        if ($('#header_msg_check').is(':checked')){
            $('#header_msg_box').show('fast');
        }else{
            $('#header_msg_box').hide('fast');
        } 
        if ($('#footer_section_check').is(':checked')){
            $('#footer_box').show('fast');
        }else{
            $('#footer_box').hide('fast');
        } 
        if ($('#paypal_donation_check').is(':checked')){
            $('#paypal_donation_box').show('fast');
        }else{
            $('#paypal_donation_box').hide('fast');
        }   
        if ($('#newsltr_check').is(':checked')){
            $('#newsltr_box').show('fast');
        }else{
            $('#newsltr_box').hide('fast');
        }
    }

    if($('.googleAdSetting').length){
        if($('#g_check').is(':checked')){
            $('#g_box').show('fast');
        }else{
            $('#g_box').hide('fast');
        }
    }

    if($('.taxSetting').length){
        if ($('#tax_check').is(':checked')){
            $('#tax_box').show('fast');
        }else{
            $('#tax_box').hide('fast');
        }   
    }

    if($('.socialLoginSetting').length){
        if ($('#g_check').is(':checked')){
            $('#g_box').show('fast');
        }else{
            $('#g_box').hide('fast');
        }
        if ($('#fb_check').is(':checked')){
            $('#fb_box').show('fast');
        }else{
            $('#fb_box').hide('fast');
        }
        if ($('#git_check').is(':checked')){
            $('#git_box').show('fast');
        }else{
            $('#git_box').hide('fast');
        }   
        if ($('#twitter_check').is(':checked')){
            $('#twitter_box').show('fast');
        }else{
            $('#twitter_box').hide('fast');
        }        
        if ($('#amazon_check').is(':checked')){
            $('#amazon_box').show('fast');
        }else{
            $('#amazon_box').hide('fast');
        }   
        if ($('#linkedin_check').is(':checked')){
            $('#linkedin_box').show('fast');
        }else{
            $('#linkedin_box').hide('fast');
        }        
    }
})

$('.updateSettings').on('change',function(){
    var id = $(this).attr('data-id');
    var requireId = $(this).attr('required-id');
    var type = $(this).attr('data-type');
    var name = $(this).data('name'); 

    if($(this).is(':checked')){
        $('#'+id).show('fast');
        $(requireId).addClass('require');
    }else{
        $('#'+id).hide('fast');
        $(requireId).removeClass('require');
        onchangeStatus({'url' : $('#URL').val(), data:{status:0, 'type':type, 'gateway_name' : name} });
    }
}); 

$(document).on('change','#is_paid', function(){
    if($(this).is(':checked')){
        $('#pay_amount').slideDown();
        $('#amount').addClass('require');
    }else{
        $('#pay_amount').slideUp();
        $('#amount').removeClass('require');
    }
})

$(document).on('change','#is_download', function(){
    if($(this).is(':checked')){
        $('#download_count').slideDown();
        $('#downloadCount').addClass('require');
    }else{
        $('#download_count').slideUp();
        $('#downloadCount').removeClass('require');
    }
})

$(document).on('keyup','#plan_amount', function(){
    if($(this).val() == 0){ 
        $('#monthDays').val('0'); 
        $('.validity_month_day').html('Validity In Days');
    }else{
        $('#monthDays').val('1'); 
        $('.validity_month_day').html('Validity In Months');
    }
})

function onchangeStatus(param){
    ajaxCall.ajax({
        headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url : param.url,
        method : 'post',
        data : param.data,
    },function(data){
        console.log(data)
    });
}

var ajaxCall = {
    ajax: (param, callBack) => {
    var ajaxOption = {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: param.url,
        method: param.method,
        data: param.data,
        success: (resp) => {
            resp = (typeof resp != 'object') ? JSON.parse(resp) : resp;
            if (resp.status == 1) {
                (resp.msg && resp.msg.trim() != '') ? toastr.success(resp.msg) : '';
                callBack(resp);
            } else if(resp.status == 0){
                toastr.error(resp.msg);
            }
        },
        error: (resp) => {
            toastr.error(resp.msg);
        }
    }
    if(param.formData){
        ajaxOption.processData = false;
        ajaxOption.contentType = false;
    }

    if(param.dataType){
        ajaxOption.dataType = param.dataType;
    }
    $.ajax(ajaxOption);
    }
}

$(document).on('change','#country_id', function(){
    var url = $(this).attr('data-url');
    var state = $('#state_id').empty();
    var city = $('#city_id').empty();
    var country = $.trim($(this).val());
    if(country != ''){
        ajaxCall.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : url,
            method : 'post',
            data : {'country_id':country},
        },function(data){
            state.append('<option value="">'+dynamicName.pleaseChoose+'</option>');
            $('#state_id, #city_id').addClass('require');
            $('[for="state_id"]').html(`${dynamicName.select} ${dynamicName.state} *`);
            $('[for="city_id"]').html(`${dynamicName.select} ${dynamicName.city} *`);
            $.each(data.data, function(id, title){
                var options = new Option(title, id, false, false);
                state.append(options).trigger('change');
            })
        });
    }else{
        $('[for="state_id"]').html(`${dynamicName.select} ${dynamicName.state}`);
        $('[for="city_id"]').html(`${dynamicName.select} ${dynamicName.city}`);
        $('#state_id, #city_id').removeClass('require');
        state.append('<option value="">'+dynamicName.pleaseChoose+'</option>').trigger('change');
        city.append('<option value="">'+dynamicName.pleaseChoose+'</option>').trigger('change');
    }
})

$(document).on('change','#state_id', function(){
    var url = $(this).attr('data-url');
    var city = $('#city_id').empty();
    var state = $.trim($(this).val());
    if(state != ''){
        ajaxCall.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : url,
            method : 'post',
            data : {'state_id':state},
        },function(data){
            city.append('<option value="">'+dynamicName.pleaseChoose+'</option>');
            $.each(data.data, function(id, title){
                var options = new Option(title, id, false, false);
                city.append(options).trigger('change');
            })
        });
    }else{
        city.append('<option value="">'+dynamicName.pleaseChoose+'</option>').trigger('change');
    }
})

if($('.mrclsDtToShowData').length){
    var url = $('.mrclsDtToShowData').attr('data-url');
    var method = $('.mrclsDtToShowData').attr('data-method');
    
    var rowClass = '';
    if($('#usersForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'name', name: 'name' },{ data: 'email', name: 'email' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3]}},{extend: 'print',exportOptions: {columns: [ 2,3]}}];
    }else if($('#locationForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'country', name: 'country' },{ data: 'iso', name: 'iso' },{ data: 'iso3', name: 'iso3' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3]}},{extend: 'print',exportOptions: {columns: [ 1, 2,3]}}];
    }else if($('#faqsForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'question', name: 'question' },{ data: 'answer', name: 'answer' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2]}},{extend: 'print',exportOptions: {columns: [ 1, 2]}}];
    }else if($('#blogCategoryForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'title', name: 'title' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2]}},{extend: 'print',exportOptions: {columns: [ 1, 2]}}];
    }else if($('#blogsDataForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'title', name: 'title' },{ data: 'detail', name: 'detail'},{ data: 'created_at', name: 'created_at' },{ data: 'is_active', name: 'is_active' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4]}}];
    }else if($('#pagesDataForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'title', name: 'title' },{ data: 'detail', name: 'detail'},{ data: 'created_at', name: 'created_at' },{ data: 'is_active', name: 'is_active' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3]}}];
    }else if($('#testimonailsForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'client_name', name: 'client_name' },{ data: 'designation', name: 'designation'},{ data: 'rating', name: 'rating'},{ data: 'detail', name: 'detail'},{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4, 5]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4, 5]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4, 5]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4, 5]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4, 5]}}];
    }else if($('#stateForm').length){
        var column = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'state', name: 'state' },{ data: 'country', name: 'country' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'print',exportOptions: {columns: [ 0, 1, 2 ]}}];
    }else if($('#cityForm').length){
        var column = [{data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false},{ data: 'city', name: 'city' },{ data: 'state', name: 'state' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 0, 1, 2 ]}},{extend: 'print',exportOptions: {columns: [ 0, 1, 2 ]}}];
    }else if($('#sliderDataForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'title', name: 'title' },{ data: 'link', name: 'link' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4 ]}}];
        var rowClass = function( row, data, dataIndex ) {
            $(row).addClass( 'sortSlider' );
            $(row).attr( 'data-id', data['id'] )
        }
    }else if($('#albumForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'album_name', name: 'album_name' },{ data: 'copyright', name: 'copyright' },{ data: 'album_movie', name: 'album_movie' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4, 5 ]}}];
    }else if($('#audioForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'audio_title', name: 'audio_title' },{ data: 'audio_genre', name: 'audio_genre' },{ data: 'artist_name', name: 'artist_name' },{ data: 'language', name: 'language' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4, 5, 6 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4, 5, 6 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4, 5, 6 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4, 5, 6 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4, 5, 6]}}];
    }else if($('#audioGenreForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'genre_name', name: 'genre_name' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3 ]}}];
    }else if($('#artistForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'artist_name', name: 'artist_name' },{ data: 'dob', name: 'dob' },{ data: 'genre_name', name: 'genre_name' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4, 5 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4, 5 ]}}];
    }else if($('#artistGenreForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'genre_name', name: 'genre_name' },{ data: 'created_at', name: 'created_at' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3 ]}}];
    }else if($('#notificationForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'user_name', name: 'user_name' },{ data: 'message', name: 'message' },{ data: 'created_at', name: 'created_at' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4 ]}}];
    }else if($('#languageForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'language_name', name: 'language_name' },{ data: 'language_code', name: 'language_code' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3 ]}}];
    }else if($('#planForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'plan_name', name: 'plan_name' },{ data: 'plan_amount', name: 'plan_amount' },{ data: 'validity', name: 'validity' },{ data: 'is_download', name: 'is_download' },{ data: 'show_advertisement', name: 'show_advertisement' },{ data: 'status', name: 'status' },{ data: 'created_at', name: 'created_at' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4, 8 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4, 8 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4, 8 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4, 8 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4, 8 ]}}];
    }else if($('#radioForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'image', name: 'image' },{ data: 'radio_name', name: 'radio_name' },{ data: 'copyright', name: 'copyright' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 2, 3, 4 ]}},{extend: 'print',exportOptions: {columns: [ 2, 3, 4 ]} }];
    }else if($('#commentDataForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'user_name', name: 'user_name' },{ data: 'message', name: 'message' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3 ]} }];
    }else if($('#couponForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'coupon_code', name: 'coupon_code' },{ data: 'description', name: 'description' },{ data: 'coupon_used_count', name: 'coupon_used_count' },{ data: 'applicable_on', name: 'applicable_on' },{ data: 'starting_date', name: 'starting_date' },{ data: 'expiry_date', name: 'expiry_date' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]} }];
    }else if($('#advForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'title', name: 'title' },{ data: 'created_at', name: 'created_at' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2 ]} }];
    }else if($('#menuForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'menu_heading', name: 'menu_heading' },{ data: 'page_name', name: 'page_name' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2 ]} }];
    }else if($('#adminDataForm').length){
        var column = [{ data: 'checkbox', name: 'checkbox', className: 'select-checkbox', targets: 0, searchable : false, orderable : false },{ data: 'menu_heading', name: 'menu_heading' },{ data: 'page_name', name: 'page_name' },{ data: 'status', name: 'status' },{ data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]} }];
    }else if($('#manualPayForm').length){
        var column = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false }, { data: 'payment_proof', name: 'payment_proof' },{ data: 'order_id', name: 'order_id' },{ data: 'user_name', name: 'user_name' },{ data: 'plan_name', name: 'plan_name' }, { data: 'amount', name: 'amount' }, { data: 'ordered_at', name: 'ordered_at' }, { data: 'status', name: 'status' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3, 4, 5, 6 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6 ]} }];
    }else if($('#subscriptionForm').length){
        var column = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false }, { data: 'order_id', name: 'order_id' },{ data: 'name', name: 'name' },{ data: 'qty', name: 'qty' }, { data: 'payment_method', name: 'payment_method' }, { data: 'amount', name: 'amount' }, { data: 'ordered_at', name: 'ordered_at' }, { data: 'status', name: 'status' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3, 4, 5, 6, 7 ]} }];
    }else if($('#currencyForm').length){
        var column = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false }, { data: 'code', name: 'code' },{ data: 'rate', name: 'rate' },{ data: 'symbol', name: 'symbol' }, { data: 'default_currency', name: 'default_currency' }, { data: 'action', name: 'action' }];
        
        var button = [{extend: 'copyHtml5', exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'csvHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'excelHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'pdfHtml5',exportOptions: {columns: [ 1, 2, 3 ]}},{extend: 'print',exportOptions: {columns: [ 1, 2, 3 ]} }];
    }

    $('.mrclsDtToShowData').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: method
        },
        "createdRow": rowClass,
        columns: column,
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        dom: 'Bfrtip',
        buttons: button,
    });
}
    $(document).on('click','#deleteUser',function(){
        var __this = $(this);
        var table = $('.mrclsDtToShowData').DataTable();
        var msg = __this.attr('data-msg');
        var obj = {};
        if(typeof msg != 'undefined'){
            var obj = {'title' : msg}
        }
        deletePopup(obj).then((result) => {
            if (result.value) {
                ajaxCall.ajax({
                    url:__this.attr('data-url'),
                    method: 'post',
                    data : '',
                },function(resp){
                    if(resp.status == 1){
                        table.row(__this.parents('tr')).remove().draw();
                    }else{
                        toastr.error(resp.msg);
                    }
                })
            }
        })
    })

    $(document).on('click','#bulkDelete',function(){
        deletePopup().then((result) => {
            if (result.value) {
                var errMSg = $(this).attr('data-msg');
                var check = $('.CheckBoxes:checked');
                var type = $(this).attr('data-type');
                if(check.length > 0){
                    var idArr = [];
                    var userIdArr = [];
                    for(var i=0; i<check.length; i++){
                        idArr.push($(check[i]).val());
                        if(typeof type != 'undefined'){
                            userIdArr.push($(check[i]).attr('data-user'))
                        }
                    }
                    
                    var data = {'checked' : idArr};
                    if(typeof type != 'undefined'){
                        data.user_id = userIdArr;
                    }
                    ajaxCall.ajax({
                        url:$(this).attr('data-url'),
                        method: 'delete',
                        data : data,
                    },function(resp){
                        $('.mrclsDtToShowData').DataTable().ajax.reload();                        
                    })
                }else{
                    toastr.error(errMSg);
                }
            }
        })
    })

    $(document).on('click','.locationPopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addEditLocation').find('form').attr('action',$(this).attr('data-url'));
            $('input[name="country"]').val('');
            $('#addEditLocation .modal-title').html(`${dynamicName.add} ${dynamicName.country}`);
            $('#addEditLocation').modal('toggle');
            $('#addEditLocation #conBtn').html(`${dynamicName.add}`);
        }else{
            $('#addEditLocation #conBtn').html(`${dynamicName.update}`);
            $('#addEditLocation').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
                method:"post"
            },function(resp){
                $('input[name="country"]').val(resp.data[0]['country']);
                $('#addEditLocation').modal('toggle');
            })
            $('#addEditLocation .modal-title').html(`${dynamicName.update} ${dynamicName.country}`);
        }
        
    })

    $(document).on('click','.statePopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addEditState').find('form').attr('action',$(this).attr('data-url'));
            $('input[name="state"]').val('');
            $('.country_id').val('').trigger('change');
            $('#addEditState .modal-title').html(`${dynamicName.add} ${dynamicName.state}`);
            $('#addEditState').modal('toggle');
        }else{
            $('#addEditState').find('form').attr('action',$(this).attr('data-save'));

            $('#addEditState .modal-title').html(`${dynamicName.update} ${dynamicName.state}`);
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
                method:"post"
            },function(resp){
                $('input[name="state"]').val(resp.data[0]['name']);
                $('.country_id').val(resp.data[0]['country_id']).trigger('change');
                $('#addEditState').modal('toggle');
            })
        }
    })

    

    $(document).on('click','.cityPopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addEditCity').find('form').attr('action',$(this).attr('data-url'));
            $('input[name="city"]').val('');
            $('.state_id').val('').trigger('change');
            $('#addEditCity .modal-title').html(`${dynamicName.add} ${dynamicName.city}`);
            $('#addEditCity').modal('toggle');
        }else{
            $('#addEditCity').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
                method:"post"
            },function(resp){
                $('input[name="city"]').val(resp.data[0]['name']);
                $('.state_id').val(resp.data[0]['state_id']).trigger('change');
                $('#addEditCity').modal('toggle');
            })
            $('#addEditCity .modal-title').html(`${dynamicName.update} ${dynamicName.city}`);
        }
    })

    $(document).on('click','.blogCategoryPopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addEditBlogCat').find('form').attr('action',$(this).attr('data-url'));
            $('input[name="title"]').val('');
            $('#addEditBlogCat .modal-title').html(`${dynamicName.add} ${dynamicName.blogCat}`);
            $('#addEditBlogCat').modal('toggle');
        }else{
            $('#addEditBlogCat').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
            },function(resp){
                $('input[name="title"]').val(resp.data['title']);
                if(resp.data['is_active']){
                    $('input[name="is_active"]').prop('checked',true);
                }else{
                    $('input[name="is_active"]').prop('checked',false);
                }
                $('#addEditBlogCat').modal('toggle');
            })
            $('#addEditBlogCat .modal-title').html(`${dynamicName.update} ${dynamicName.blogCat}`);
        }       
    })

    $(document).on('click','.audioGenrePopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addUpdateAudioGenre').find('form').attr('action',$(this).attr('data-url'));
            $('#genreImage').html('Choose Image');
            $('input[name="title"]').val('');
            $('#addUpdateAudioGenre .modal-title').html(`${dynamicName.add} ${dynamicName.audioGenre}`);
            $('#addUpdateAudioGenre').modal('toggle');
        }else{
            $('#addUpdateAudioGenre').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
            },function(resp){
                console.log(resp)
                $('input[name="genre_name"]').val(resp.data['genre_name']);
                $('#genreImage').html(resp.data['image']);
                (resp.data['is_featured']) ? $('input[name="is_featured"]').prop('checked',true) : $('input[name="is_featured"]').prop('checked',false);
                (resp.data['is_trending']) ? $('input[name="is_trending"]').prop('checked',true) : $('input[name="is_trending"]').prop('checked',false);
                (resp.data['is_recommended']) ? $('input[name="is_recommended"]').prop('checked',true) : $('input[name="is_recommended"]').prop('checked',false);
                (resp.data['status']) ? $('input[name="status"]').prop('checked',true) : $('input[name="status"]').prop('checked',false);
                $('#addUpdateAudioGenre').modal('toggle');
            })
            $('#addUpdateAudioGenre .modal-title').html(`${dynamicName.update} ${dynamicName.audioGenre}`);
        }
        
    })

    $(document).on('click','.artistGenrePopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addEditArtistGenre').find('form').attr('action',$(this).attr('data-url'));
            $('input[name="genre_name"]').val('');
            $('#addEditArtistGenre .modal-title').html(`${dynamicName.add} ${dynamicName.artistGenre}`);
            $('#addEditArtistGenre #genreBtn').html(`${dynamicName.add}`);
            $('#addEditArtistGenre').modal('toggle');
        }else{
            $('#addEditArtistGenre').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
                method:"post"
            },function(resp){
                $('input[name="genre_name"]').val(resp.data['genre_name']);
                $('#addEditArtistGenre').modal('toggle');
            })
            $('#addEditArtistGenre #genreBtn').html(`${dynamicName.update}`);
            $('#addEditArtistGenre .modal-title').html(`${dynamicName.update} ${dynamicName.artistGenre}`);
        }
    })


    $(document).on('click','.notificationPopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addNotification').find('form').attr('action',$(this).attr('data-url'));
            $('input[name="genre_name"]').val('');
            $('#addNotification .modal-title').html(`${dynamicName.add} ${dynamicName.notification}`);
            $('#addNotification #genreBtn').html(`${dynamicName.add}`);
            $('#addNotification').modal('toggle');
        }else{
            $('#addNotification').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
                method:"post"
            },function(resp){
                $('input[name="genre_name"]').val(resp.data['genre_name']);
                $('#addNotification').modal('toggle');
            })
            $('#addNotification #genreBtn').html(`${dynamicName.update}`);
            $('#addNotification .modal-title').html(`${dynamicName.update} ${dynamicName.notification}`);
        }
    })
    
    $(document).on('click','.languagePopup', function(){
        var add = $(this).attr('data-add');
        if(typeof add != 'undefined'){
            $('#addUpdateLanguage').find('form').attr('action',$(this).attr('data-url'));
            $('#language_name, #langauge_code').val('');
            $('#addUpdateLanguage .modal-title').html(`${dynamicName.add} ${dynamicName.language}`);
            $('#addUpdateLanguage #langBtn').html(`${dynamicName.add}`);
            $('#addUpdateLanguage').modal('toggle');
        }else{
            $('#addUpdateLanguage').find('form').attr('action',$(this).attr('data-save'));
            ajaxCall.ajax({
                url:$(this).attr('data-url'),
                method:"post"
            },function(resp){
                $('[name="language_name"]').val(resp.data['language_name']);
                $('[name="language_code"]').val(resp.data['language_code']);
                (resp.data['status'] == 1) ? $('#switchStatus').prop('checked',true) : $('#switchStatus').prop('checked',false);
                (resp.data['is_default'] == 1) ? $('#switchDefault').prop('checked',true) : $('#switchDefault').prop('checked',false);
                $('#addUpdateLanguage').modal('show');
            })
            $('#addUpdateLanguage #langBtn').html(`${dynamicName.update}`);
            $('#addUpdateLanguage .modal-title').html(`${dynamicName.update} ${dynamicName.language}`);
        }
    })

    $(document).on('click', '.currencyPopup', function(){
        $('#addEditCurrency').modal('toggle');
    })

    $(document).on('click','.makeDefaultCurr', function(){
        var _this = $(this);
        var name = _this.attr('data-name');
        var cur_id = _this.val();
        deletePopup({'title' : dynamicName.are_u_sure, 'text' : dynamicName.make_default+name+dynamicName.default_curr, 'cnfButton' : dynamicName.ok}).then((result) => {
            if (result.value) {
                ajaxCall.ajax({
                    url: baseUrl+'/make_default',
                    method: 'post',
                    data : {id : cur_id}
                },function(resp){
                    $('.mrclsDtToShowData').DataTable().ajax.reload();
                })
            }else{
                _this.prop('checked', false)
            }
        })
    });

    $('.updateRate').on('click', function(){
        var _this = $(this);
        deletePopup({'title' : dynamicName.are_u_sure, 'text' : dynamicName.update_rate_text, 'cnfButton' : dynamicName.ok}).then((result) => {
            if (result.value) {
                _this.find('i').addClass('fa-spin fa-fw').prop('disabled', true);
                ajaxCall.ajax({
                    url: baseUrl+'/auto_update/rate',
                    method: 'post',
                },function(resp){})
                _this.find('i').removeClass('fa-spin fa-fw').prop('disabled', false);
                window.location.reload();
            }
        })
    })

    function deletePopup(param=''){
        return Swal.fire({
            title : (param.title) ? param.title : dynamicName.delete_records,
            text: (param.text) ? param.text : dynamicName.cantUndone,
            showCancelButton: true,
            confirmButtonText: (param.cnfButton) ? param.cnfButton : dynamicName.delete
        });
    }

    $(document).on('change','.changeStatus', function(){
        if($(this).is(':checked'))
            var status = 1;
        else
            var status = 0;
        ajaxCall.ajax({
            url:$(this).attr('data-url'),
            method: 'patch',
            data : {status:status}
        },function(resp){})
    })

    $(document).on('change','.changeDataVal', function(){
        var field = $(this).attr('data-field');
        if($(this).is(':checked'))
            var value = 1;
        else
            var value = 0;
        ajaxCall.ajax({
            url:$(this).attr('data-url'),
            method: 'patch',
            data : {[field]:value}
        },function(resp){})
    })
    
    if($('.sortDataOfTable').length){
        $( ".sortDataOfTable tbody" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];
            $('tr.sortSlider').each(function(index,element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });
            ajaxCall.ajax({
                headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url : "saveSliderPosition",
                method : 'post',
                data : {order:order},
                dataType: "json", 
            },function(data){
                console.log(data)
            });
        }
    }

$(document).on('change','input[name="is_album_movie"]', function(){
    if($(this).val() == 0){
        $('.showMovieName').removeClass('d-none');
        $('.showAlbumName').addClass('d-none');
        $('[name="movie_id"]').addClass('require');
        $('[name="album_id"]').removeClass('require');
    }else{
        $('.showMovieName').addClass('d-none');
        $('.showAlbumName').removeClass('d-none');
        $('[name="album_id"]').addClass('require');
        $('[name="movie_id"]').removeClass('require');
    }
})

$(document).on('click', '#replyOnComment', function(){
    $('#add_reply #replyBox').html('');
    var url = $(this).data('url');
    var getUrl = $(this).data('get-url');
    $('#addReply').find('form').attr('action', url);
    ajaxCall.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : getUrl,
        method : 'post',
    },  function(data){
            $('#add_reply #replyBox').html(data.reply);
        })
    $('#addReply').modal('toggle');
})

$(document).on('change','input[name="applicable_on"]', function(){
    if($(this).val() == 0){
        $('.applicable_plan').addClass('d-none');
        $('#planId').removeClass('require');
    }else{
        $('.applicable_plan').removeClass('d-none');
        $('#planId').addClass('require');
    }
})


$(document).on('change', '.enableDisableSettng', function(){
    if($(this).is(':checked')){
        $(this).closest('tr').find('.numberOfItem').removeClass('d-none');
        $(this).closest('tr').find('.numberOfItem input').addClass('require');

    }else{
        $(this).closest('tr').find('.numberOfItem').addClass('d-none');
        $(this).closest('tr').find('.numberOfItem input').removeClass('require');
    }
})

$(document).on('click', '#paymentProofImg', function(){
    var img = $(this).attr('src');
    $('#payment_proof_popup').find('img').attr('src', img);
    $('#payment_proof_popup').modal('show');    
})

$(document).on('change', '[name="paymentStatus"]', function(){
    var status = $(this).val();
    var id = $(this).closest('select').attr('data-payment-id');
    ajaxCall.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : baseUrl+'/payment_status',
        method : 'post',
        data : {'status' : status, 'payment_id' : id }
    },  function(data){
            $('.mrclsDtToShowData').DataTable().ajax.reload();
        })
});


$(document).on('click', '.addCond', function(){
    $('.appendTermCond').append(`<div class="form-group"><input type="text" name="termCond" value="" class="termCond form-control require" placeholder="${$('.termCond').attr('placeholder')}" /><a href="javascript:;" class="addCond"><i class="fa fa-plus-circle" class="addCond"></i></a> <a href="javascript:;" class="deleteCond"><i class="fa fa-trash"></i></a></div>`);
})

$(document).on('click', '.deleteCond', function(){
    $(this).parent().remove();
})

$('#saveInvoiceSetting').on('click', function(){
    var form = $(this).closest('form').attr('id');
    var formValid = myCustom.checkFormFields(form);
    if(!formValid){
        var formData = new FormData($('#invoiceSett')[0]);
        var termsArr = [];
        $('.termCond').each(function(){
            termsArr.push($(this).val());
        })
        formData.append('terms' , termsArr);
        $.ajax({
            url : baseUrl+'/saveInvoice',
            method : 'post',
            data : formData,
            contentType : false,
            processData : false,
            success : function(resp){
                var res = JSON.parse(resp);
                if(res.status == 1){
                    toastr.success(res.msg);
                    setTimeout(function(){
                        location.reload();
                    }, 1000)
                }
            }
        })
    }
})
function checkAll(ele,clas){
    if (ele.checked)
        $('.'+clas).prop("checked",true);
    else
        $('.'+clas).prop("checked",false);
}


