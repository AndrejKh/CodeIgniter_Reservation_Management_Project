<div class="row pt-5">
    <div class="col-md-6 offset-md-3 event-form">
        <div class="card" style="max-width: 27rem; margin: 20px auto; border: 0 !important;">
            <img src="<?= base_url() ?>/assets/images/events/<?= $event['image'] ?>" style="width: 100%; height: 100%;max-height: 300px;" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center mb-0" style="font-size: 18px; ">Data: <span class="fw-bold text-capitalize"> <?= $event['date'] ?></span> </p>
                <p class="card-text text-center" style="font-size: 22px;">Te ftuar: <span class="fw-bold text-capitalize"> <?= $event['guest'] ?></span> </p>
            </div>
        </div>

        <h2 class="text-center fw-bold"><?= $title; ?></h2>

        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('reservations/register/' . $this->uri->segment(3), ['id' => 'requestForm']); ?>


        <div class="form-group mb-3">
            <label>Emri</label>
            <input type="text" class="form-control" required name="name" placeholder="Shto emer">
        </div>

        <div class="form-group mb-3">
            <label>Mbiemri</label>
            <input type="text" class="form-control" required name="last_name" placeholder="Shto mbiemer">
        </div>

        <div class="form-group mb-3">
            <label>Nr telefoni</label>
            <input type="tel" class="form-control" required name="phone_nr" placeholder="Shto numrin e telefonit">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" required name="email" placeholder="Shto email">
        </div>

        <div class="form-group mb-3">
            <label>Nr i personave</label>
            <input type="number" class="form-control" required name="total_persons" placeholder="Shto numrin e presonave" min="1">
        </div>

        <button type="submit" class="btn btn-primary">Dergo</button>
        </form>
    </div>
</div>