<div class="row table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Last name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Total persons</th>
                <th scope="col">Payment status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservationList as $key => $reservation) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $reservation['name'] ?></td>
                    <td><?= $reservation['lastname'] ?></td>
                    <td><?= $reservation['phone_nr'] ?></td>
                    <td><?= $reservation['email'] ?></td>
                    <td><?= $reservation['total_persons'] ?></td>
                    <td>
                        <?php if ($reservation['payment_status'] == 1) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#198754" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg>
                        <?php } else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc3545" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        <?php } ?>

                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?= base_url() ?>reservations/update/<?= $reservation['idreservations'] ?>">Edit</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php if ($links) { ?>
        <p><?php echo $links; ?></p>
    <?php } ?>
</div>