<div class="row">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Img</th>
        <th scope="col">Date</th>
        <th scope="col">Guest</th>
        <th scope="col">Price</th>
        <th scope="col">Total ticket</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($eventList as $key => $event) { ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>
          <td><img src="<?= base_url() ?>/assets/images/events/<?= $event['image'] ?>" class="card-img" style="height: 80px;object-fit: cover;width: 150px;" alt="..."></td>
          <td><?= $event['date'] ?></td>
          <td><?= $event['guest'] ?></td>
          <td><?= $event['ticket_price'] ?></td>
          <td><?= $event['total_ticket'] ?></td>
          <td>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Action
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item" href="<?= base_url() ?>events/update/<?= $event['idevents'] ?>">Edit</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?= base_url() ?>reservations/create/<?= $event['idevents'] ?>">Add Reservation</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?= base_url() ?>events/<?= $event['idevents'] ?>/reservations">Reservation List</a>
                </li>
                <li>
                  <a class="dropdown-item" class="btn btn-danger" href="<?= base_url() ?>events/delete/<?= $event['idevents'] ?>">Delete </a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>