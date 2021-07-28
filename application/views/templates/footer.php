		</div>
		<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Ldl0nobAAAAAJrOorSildIoHe00e5_XB9dNrD4G"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
		</script>
		<script>
			const closeAlert = document.getElementById('closeAlert');
			const flashAlert = document.querySelector('.alert');
			if (closeAlert) {
				closeAlert.addEventListener('click', function() {
					flashAlert.style.display = "none";
				})

				setTimeout(function() {
					flashAlert.style.display = "none";
				}, 3500);
			}
		</script>

		<script src="<?= base_url() . 'assets/js/utils.js' ?>"></script>

		</body>

		</html>