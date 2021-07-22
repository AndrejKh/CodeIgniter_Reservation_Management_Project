<!DOCTYPE html>
<html>

<head>
  <title>request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
</head>

<body>
  <?php if ($this->session->userdata('logged_in')) : ?>

    <header class="navbar sticky-top navbar-light bg-light flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-dark text-white py-2" href="#">Company name</a>
      <div class="dropdown admin-desktop">
        <a href="#" class="btn dropdown-toggle py-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> -->
          <strong><?= $this->session->userdata('username'); ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
          <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
        </ul>
      </div>
      <button class="navbar-toggler position-absolute d-md-none collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse bg-dark">
          <div class="sidebar-menu">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link text-secondary active" aria-current="page" href="<?php echo base_url(); ?>events/list">
                    <span data-feather="home"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true">
                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary" href="<?php echo base_url() .
                                                              'events/list' ?>">
                    <span data-feather="file"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16" style="margin-right: 4px;">
  <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
  <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
                    Events
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary" href="<?php echo base_url(); ?>events/create">
                    <span data-feather="shopping-cart"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16" style="margin-right: 4px">
  <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> 
                    Add events
                  </a>
                </li>
              </ul>
              <h6 class="
                sidebar-heading
                d-flex
                justify-content-between
                align-items-center
                px-3
                mt-4
                mb-1
                text-muted
              ">

            </div>
            <div class="pb-4">
              <hr style="color: #fff">
              <div class="dropdown admin-dropdown">
              <a href="#" class="btn dropdown-toggle py-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> -->
                <strong class="text-white"><?= $this->session->userdata('username'); ?></strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
              </ul>
      </div>
            
            </div>
          </div>
      </div>

      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="
              d-flex
              justify-content-between
              flex-wrap flex-md-nowrap
              align-items-center
              pt-3
              pb-2
              mb-3
              border-bottom
            ">
          <!-- <h1 class="h2">Dashboard</h1> -->
          <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">
                Share
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary">
                Export
              </button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div> -->

        </div>
        <!--    </main> -->

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>


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