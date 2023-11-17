<script src="{{asset('frontend/assets/js/vendor/modernizr.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/js.cookie.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/sal.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/counterup.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

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