<div class="row">
  <div class="col-md-10 offset-md-1 table-responsive">
    <table class="table table-striped mt-4 table-sm">
      <thead class="bg-secondary text-white">
        <tr>
          <th scope="col">Nr</th>
          <th scope="col">ID</th>
          <th scope="col">IP</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <?php if (!empty($requestsList[0]['ip_nr'])) { ?>
            <th scope="col">Req Nr</th>
          <?php } ?>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($requestsList as $key => $request) { ?>
          <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <th scope="row"><?= $request['user_req_id'] ?></th>
            <th scope="row"><a href="<?php echo base_url(); ?>request/list-ip/<?= $request['ip'] ?>"><?= $request['ip'] ?></a></th>
            <td><?= $request['username'] ?></td>
            <td><?= $request['email'] ?></td>
            <?php if (!empty($request['ip_nr'])) { ?>
              <td><?= $request['ip_nr'] ?></td>
            <?php } ?>
            <td class="d-flex justify-content-start">
              <?php echo form_open('/request/delete_user_request/' . $request['user_req_id']); ?> <input type="hidden" name="form_id" value="<?= $request['form_id'] ?>"><input type="submit" value="Delete" class="btn btn-sm btn-outline-danger mr-2"> </form>
              <?php echo form_open('/request/confirm-request/'); ?> <input type="hidden" name="ip" value="<?= $request['ip'] ?>"> <input type="hidden" name="form_id" value="<?= $request['form_id'] ?>"> <input type="hidden" name="req-urls" value="<?= $request['urls'] ?>"> <input type="hidden" name="reqID" value="<?= $request['user_req_id'] ?>"> <input type="hidden" name="email" value="<?= $request['email'] ?>"> <input type="hidden" name="username" value="<?= $request['username'] ?>"> <input type="submit" value="Paid User" class="btn btn-sm btn-outline-success mr-2"> </form>
              <?php echo form_open('/request/free-user/'); ?><input type="hidden" name="ip" value="<?= $request['ip'] ?>"> <input type="hidden" name="reqID" value="<?= $request['form_id'] ?>"> <input type="hidden" name="email" value="<?= $request['email'] ?>"> <input type="submit" value="Free User" class="btn btn-sm btn-outline-info"> </form>
              <?php echo form_open('/request/wrong-username/', ['class' => 'px-1']); ?> <input type="hidden" value="<?= $request['user_req_id'] ?>" name="reqID"><input type="hidden" name="ip" value="<?= $request['ip'] ?>"> <input type="hidden" name="formID" value="<?= $request['form_id'] ?>"> <input type="hidden" name="email" value="<?= $request['email'] ?>"> <input type="submit" value="Wrong Username" class="btn btn-sm btn-outline-info"> </form>
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