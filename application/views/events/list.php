<div class="row">
  <?php foreach ($eventList as $event) { ?>

    <div class="col-md-3 my-4">

      <div class="card bg-dark text-white">
        <img src="<?= base_url() ?>/assets/images/events/<?= $event['image'] ?>" class="card-img" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $event['guest'] ?></h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text">Last updated 3 mins ago</p>
        </div>
      </div>
    </div>
  <?php } ?>
</div>