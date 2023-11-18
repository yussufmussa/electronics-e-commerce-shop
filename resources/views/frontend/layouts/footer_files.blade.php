<!-- Modernizr-JS -->
<script type="text/javascript" src="{{asset('frontend/assets/js/vendor/modernizr-custom.min.js')}}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{asset('frontend/assets/js/nprogress.min.js')}}"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<!-- Popper -->
<script type="text/javascript" src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.elevatezoom.min.js')}}"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery-ui.range-slider.min.js')}}"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.slimscroll.min.js')}}"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.resize-select.min.js')}}"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.custom-megamenu.min.js')}}"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.custom-countdown.min.js')}}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<!-- Main -->
<script type="text/javascript" src="{{asset('frontend/assets/js/app.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
	$(document).ready(function() {
		updateCartQuantity();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.add-to-cart').click(function(event) {
			// Prevent the default link behavior
			event.preventDefault();
			let productId = $(this).data('id');
			$.ajax({
				url: "/add-to-cart",
				data: {
					id: productId
				},
				method: "POST",
				dataType: "json",
				success: function(data) {
					toastr.options.closeButton = true;
					toastr.options.closeMethod = 'fadeOut';
					toastr.options.closeDuration = 100;
					toastr.success(data.message);
					// Update cart quantity after adding to cart
					updateCartQuantity();
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});

		function updateCartQuantity() {
			$.ajax({
				url: "/get-cart-quantity",
				method: "GET",
				dataType: "json",
				success: function(data) {
					$('#cart-quantity').text(data.quantity);
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		}

		$('.remove-from-cart').click(function(event) {
			// Prevent the default link behavior
			event.preventDefault();
			let productId = $(this).data('id');
			$.ajax({
				url: "/remove-from-cart",
				data: {
					id: productId
				},
				method: "POST",
				dataType: "json",
				success: function(data) {
					toastr.options.closeButton = true;
					toastr.options.closeMethod = 'fadeOut';
					toastr.options.closeDuration = 100;
					toastr.success(data.message);
					// Update cart quantity after adding to cart
					updateCartQuantity();
					$('#cartItem_' + productId).remove();
				},
				error: function(xhr, status, error) {
					// Handle error
					console.error(error);
				}
			});
		});


		// Call the function initially
		updateFullCartQuantity();

		$(document).on('click', '.plus-btn, .minus-btn', function(event) {
			event.preventDefault();
			let productId = $(this).data('id');
			let action = $(this).hasClass('plus-btn') ? 'add' : 'remove';

			// Make AJAX request to update quantity
			updateFullCartQuantity(productId, action);
		});

		function updateFullCartQuantity(productId, action) {
			$.ajax({
				url: "/update-cart-quantity",
				method: "POST",
				data: {
					id: productId,
					action: action
				},
				dataType: "json",
				success: function(data) {
					// Update quantity in the cart row
					$(`#cart-item-${productId} .tt-input-counter input`).val(data.quantity);
					updateCartQuantity();

				},
				error: function(xhr, status, error) {
					// Handle error
					console.error(error);
				}
			});
		}
		updateFullCartQuantity();

	});
</script>
@yield('extra_js_script')
@livewireScripts
</body>

</html>