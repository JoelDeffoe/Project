<?php
$navItems = Lib\Page::navItems();
?>
<div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted" href="#">EN</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="index.php">logo</a>
        </div>
      </div>
    </header>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
      <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav mr-auto">
          <?php
          foreach($navItems as $item) {
              ?>
          <li class="nav-item">
            <a class="nav-link<?php echo Lib\Request::pathInfo()->getUri()===$item['url']?' active':'';?>" href="<?php echo $item['url'];?>">
                <?php echo $item['text'];?>
            </a>
          </li>
          <?php
      }
      ?>
        </ul>
      </div>
    </nav>
