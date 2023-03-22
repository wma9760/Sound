</div>
</div>
<div class="footerbar">
    <footer class="footer">
        <p class="mb-0">© Copyright 2021, All Rights Reserved Miraculous</p>
    </footer>
</div>
</div>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
    integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{url('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap.min.js')}}"></script> --}}
    <script src="{{url('frontend/assets/js/modernizr.min.js')}}"></script>
    {{-- <script src="{{url('frontend/assets/js/detect.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.slimscroll.js')}}"></script> --}}
    <script src="{{url('frontend/assets/js/vertical-menu.js')}}"></script>
    {{-- <script src="{{url('frontend/assets/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/valid.js')}}"></script>
    <script src="{{url('frontend/assets/js/submit.js')}}"></script> --}}
    <script src="{{url('frontend/assets/js/core.js')}}"></script>
    <script src="{{url('frontend/assets/js/player/player.js')}}"></script>
    {{-- <script src="{{url('frontend/assets/plugins/chart-js/chart.min.js')}}"></script> --}}
    {{-- <script src="{{url('frontend/assets/js/dashboard.js')}}"></script> --}}
    <script>


// var player = new Plyr('.js-player', {
//   muted: true
// });
// player.on('ready', () => {
//     player.play();
// });
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}

	var accordion = new Accordion($('#accordion'), false);
});


    $(document).ready(function(){
  $(".togglebar").click(function(){
    $("leftbar").toggle();
  });
});

$(document).on('change', '.form-group input[type="checkbox"]', function() {
  if ($(this).is(":checked")) {
      $(this).val(1)
    } else{
        $(this).val(0)
    }

});
         </script>

        @yield('other_scripts')
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                @yield('postJquery');
            });
        </script>

</body></html>
