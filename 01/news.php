<?php
require_once 'bd.php';
$sql = 'SELECT * FROM `articles` WHERE `id` = :id';
$id = $_GET['id'];
$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);

$article = $query->fetch(PDO::FETCH_OBJ);

$title = $article->title;
require 'template/title.php';
?>
<body class="d-flex flex-column h-100">
    
    <?php require 'template/header.php' ?>
    
    <main class="container mt-3">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">World</strong>
            <h3 class="mb-0">Featured post</h3>
            <div class="mb-1 text-muted">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">Post title</h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            </div>
        </div>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1 class="pb-4 mb-4 fst-italic border-bottom">
                    <?php
                        echo $article->title;
                    ?>
                </h1>
            </div>
        
        <article class="blog-post">
            <p class="blog-post-meta"><?php 
            $date = date('d ', $article->date);
            $array = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
            $date .= $array[date('n', $article->date) - 1];
            $date .= date(' H:i', $article->date);
            echo $date; ?> by <mark><?php echo $article->avtor; ?></mark></p>
            <?php  echo $article->text; ?>
        </article>

        <h3 class="pb-4 mb-4 fst-italic border-bottom">Комментарии</h3>

            <form action="news.php?id=<?php echo $_GET['id'];?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $_COOKIE['login'] ?>">
                </div>
                <div class="mb-3">
                    <label for="mess" class="form-label">Сообщение</label>
                    <textarea name="mess" id="mess" class="form-control"></textarea>
                </div>
                <div class="mb-3 alert alert-danger" id="error_block">

                </div>
                <div class="mb-3 alert alert-success" id="success_block">
                    Комментарий оставлен
                </div>
                <div class="mb-3">
                    <button type="submit" id="mess_send" class="btn btn-primary">Добавить комментарий</button>
                </div>
            </form>

            <?php
                if (isset($_POST['username']) != '' && isset($_POST['mess']) != '') {
                    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                    $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
                    $query = $pdo->prepare($sql);
                    $query->execute([$username, $mess, $_GET['id']]);
                }

                $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
                $query = $pdo->prepare($sql);
                $query->execute(['id' => $_GET['id']]);
                $comments = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($comments as $comment) {
                    echo "<div class='alert alert-info'>
                        <h4>$comment->name</h4>
                        <p>$comment->mess</p>
                    </div>";
                }
            ?>

        </div>

        <?php require 'template/aside.php' ?>

        </div>
    </div>

    </main>

    <?php require 'template/footer.php' ?>
</body>
</html>