<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="link-secondary" href="/php/01/contacts.php">Контакты</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="/php/01/">PHP Blog</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
            </a>
            <?php
            if ($_COOKIE['login'] == ''):
            ?>
            <a class="btn btn-sm btn-outline-secondary" href="/php/01/auth.php">Войти</a>
            <a class="btn btn-sm btn-outline-secondary ms-2" href="/php/01/reg.php">Регистрация</a>
            <?php
                else:
            ?>
            Привет,&nbsp;<b><?php echo $_COOKIE['login'];?></b>
            <a class="btn btn-sm btn-outline-secondary ms-2" href="/php/01/add_article.php" style="white-space:nowrap;">Добавить статью</a>
            <a class="btn btn-sm btn-outline-secondary ms-2" href="/php/01/auth.php">Кабинет</a>
            <a class="btn btn-sm btn-outline-secondary ms-2" href="" id="exit_btn">Выйти</a>
            <?php
                endif;
            ?>
        </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        <a class="p-2 link-secondary" href="#">World</a>
        <a class="p-2 link-secondary" href="#">U.S.</a>
        <a class="p-2 link-secondary" href="#">Technology</a>
        <a class="p-2 link-secondary" href="#">Design</a>
        <a class="p-2 link-secondary" href="#">Culture</a>
        <a class="p-2 link-secondary" href="#">Business</a>
        <a class="p-2 link-secondary" href="#">Politics</a>
        <a class="p-2 link-secondary" href="#">Opinion</a>
        <a class="p-2 link-secondary" href="#">Science</a>
        <a class="p-2 link-secondary" href="#">Health</a>
        <a class="p-2 link-secondary" href="#">Style</a>
        <a class="p-2 link-secondary" href="#">Travel</a>
        </nav>
    </div>
</div>