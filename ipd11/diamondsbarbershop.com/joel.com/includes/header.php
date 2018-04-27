<?php
$navItems = Lib\Page::navItems();
?>
<header class="header clearfix">
    <nav>
        <ul class="nav nav-pills float-right">
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
    </nav>
    <h3 class="text-muted">
        <a href="/" class="brand">Project name</a>
    </h3>
</header>