<!DOCTYPE html>
<html>

<head>
  <title>request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
</head>

<body>
  <?php if ($this->session->userdata('logged_in')) : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Request</a>
        <div id="navbar">
          <ul class=" navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>request/create">Submit requests</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>request/create-admin">Create form</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>request/list">Request List</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>request/completed">Completed List</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>request/list-admin">Admin Forms</a></li>
            <li> <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>

  <div class="container-fluid">
    <!-- Flash messages -->
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <?php if ($this->session->flashdata('user_registered')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('post_created')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('post_updated')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('category_created')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('post_deleted')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('login_failed')) : ?>
          <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('bad_request')) : ?>
          <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('bad_request') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('user_loggedin')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('user_loggedout')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('category_deleted')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('email_sent')) : ?>
          <?php echo '<p class="alert alert-success">' . $this->session->flashdata('email_sent') . '</p>'; ?>
        <?php endif; ?>
      </div>
    </div>