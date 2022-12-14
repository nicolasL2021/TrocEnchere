<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= isset($title) ? $title : 'Troc-Enchères' ?>
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../css/nav.css" rel="stylesheet">
    <link href="../../css/animationCategory.css" rel="stylesheet">
    <link href="../../css/timer.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <header class="mb-auto pb-5">
        <?php include('nav.php'); ?>
    </header>
    <main class="mt-auto">
        <div class="container mt-auto">
            <!-- Content section-->
            <?= $content ?>
        </div>
    </main>
    <footer class="py-5 bg-dark footer mt-auto">
        <div class="container">
            <?php if(defined('DEBUG_TIME')):?>
            <p class="text-white">Page générée en <?= round(1000*(microtime(true)- DEBUG_TIME)) ?>ms</p>
            <?php endif ?>
            <p class="m-0 text-center text-white">Copyright &copy; Troc-Enchères 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/906f0fffa0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core theme JS-->
    <script src="../../js/nav.js"></script>
    <script src="../../js/modal.js"></script>
    <script src="../../js/timer.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>