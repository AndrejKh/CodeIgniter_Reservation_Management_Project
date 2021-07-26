
  	<div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                  <h3 class="fw-bold py-3 text-capitalize">
										<span class="badge bg-success"><?= $event['guest'] ?></span>
                  </h3>
              </div>
          </div>
        <div class="row py-2 d-flex justify-content-center">
					<div class="col-lg-6 col-md-8">
						<div class="row p-2">
							<table class="table">
								<tbody>
									<tr>
										<th scope="row">Emër Mbiemër</th>
										<td><?= $reservation['name'] .' ' . $reservation['lastname'] ?></td>
									</tr>
									<tr>
										<th scope="row">Tel</th>
										<td><?= $reservation['phone_nr']?></td>
									</tr>
									<tr>
										<th scope="row">Email</th>
										<td><?= $reservation['email'] ?></td>
									</tr>
									<tr>
										<th scope="row">Nr Personave</th>
										<td><?= $reservation['total_persons'] ?></td>
									</tr>
									<tr>
										<th scope="row">Pagesa</th>
										<td>
										<?php if ($reservation['payment_status'] == 1) { ?>
													<span class="me-1">Paguar</span>
													<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#198754"
															class="bi bi-check2-circle" viewBox="0 0 16 16">
															<path
																	d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
															<path
																	d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
													</svg>
													<?php } else { ?>
													<span class="me-1">Pa Paguar</span>
													<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#dc3545"
															class="bi bi-x-circle" viewBox="0 0 16 16">
															<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
															<path
																	d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
													</svg>
                        <?php } ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12"></div>
					<div class="col-lg-6 col-md-8 p-0">
							<img
							src="<?= base_url() ?>/assets/images/events/<?= $event['image'] ?>"
							style="width: 100%; max-height:350px; object-fit:cover;"
							/>
					</div>
				</div>
	</div>
  