<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Waste Sorting</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link <?= $active_main ?? ''?>" href="/">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?= $active_daily ?? ''?>" href="/daily">Daily</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?= $active_weekly ?? ''?>" href="/weekly">Weekly</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?= $active_new ?? ''?>" href="/change/create">New Collection</a>
        </li>
    </ul>
  </div>
</nav>
