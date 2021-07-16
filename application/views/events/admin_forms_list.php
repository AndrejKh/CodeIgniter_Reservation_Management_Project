<div class="row">
  <div class="col-md-10 offset-md-1 table-responsive">
    <table class="table table-striped mt-4 table-sm">
      <thead class="bg-secondary text-white">
        <tr>
          <th scope="col">Nr</th>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Referer</th>
          <th scope="col">URLS</th>
          <th scope="col">Req Nr</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($formsList as $key => $form) { ?>
          <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <th scope="row"><a href="<?php echo base_url(); ?>request/list-submited/<?= $form['id'] ?>"><?= $form['id'] ?></a></th>
            <td><?= $form['form_title'] ?></td>
            <td><?= $form['referer'] ?></td>
            <td><?= $form['urls'] ?></td>
            <td><?= $form['req_nr'] ?></td>
            <td class="d-flex justify-content-start">
              <?php echo form_open('/request/delete_admin_forms/' . $form['id']); ?> <input type="submit" value="Delete" class="btn btn-sm btn-outline-danger mr-2"> </form>
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
    <?php if ($links) { ?>
      <p><?php echo $links; ?></p>
    <?php } ?>

  </div>
</div>