<div class="row ">
	<div class="col-md-4 col-md-offset-4  " style="margin: 0 auto;">
			<?php echo form_open('users/login'); ?>
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
			<?php echo form_close(); ?>
		</div>
	</div>