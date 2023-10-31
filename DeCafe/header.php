<nav class="navbar navbar-expand  navbar-dark bg-primary sticky-top">
    <div class="container">
      <a class="navbar-brand" href="."><i class="bi bi-cup-hot"></i> DeCafe</a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
              echo $hasil["username"];
              ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-2">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
              <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> Longout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>