<? use Libs\App; ?>

<! DOCTYPE html>

<html>
    <head>
        <script>
            window.BASE_DIR_AJAX = "<?= BASE_DIR_AJAX ?>";
            window.BASE_DIR = "<?= ADMIN_PREFIX ?>";
            window.USER_DIR = "<?= MAIN_PREFIX ?>";
        </script>
        <title>
            <?= $this->getTitle(); ?>
        </title>
        <meta charset="UTF-8"/>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.cdnfonts.com/css/chirp-2" rel="stylesheet">

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        
        <link rel="apple-touch-icon" sizes="57x57"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180"
              href="<?= TEMPLANE_PATH ?>/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"
              href="<?= TEMPLANE_PATH ?>/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32"
              href="<?= TEMPLANE_PATH ?>/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96"
              href="<?= TEMPLANE_PATH ?>/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16"
              href="<?= TEMPLANE_PATH ?>/icon/favicon-16x16.png">
        <link rel="manifest" href="<?= TEMPLANE_PATH ?>/icon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage"
              content="<?= TEMPLANE_PATH ?>/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link href="<?= TEMPLANE_ADMIN_PATH ?>/style.css?<?= rand() ?>"
              rel="stylesheet"/>
        <link href="<?= TEMPLANE_PATH ?>/css/preloader.css" rel="stylesheet"/>
        <script src="<?= TEMPLANE_ADMIN_PATH ?>/script.js?<?= rand() ?>"></script>

        <? if (isset($this->addjs)): ?>
            <script type="text/javascript"
            src="<?= $this->addjs ?>?<?= rand(100, 1000000) ?>"></script>
        <? endif ?>
        <? if (isset($this->addcss)): ?>
            <link rel="stylesheet"
                  href="<?= $this->addcss ?>?<?= rand(100, 1000000) ?>">
        <? endif ?>
    </head>
    <body>
        <div class="header" style="padding: 0px; margin: 0px;">
            <div class="col-md-12">
                <a class="title" href="/kryuchkova/diplom/"
                   style="font-family: 'Times New Roman', Times, serif;">ADMIN PANEL</a>
                <ul class="nav menu">
                    <li class="<?= ADMIN_PREFIX ?>">
                        <a href="<?= MAIN_PREFIX ?>/admin/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" fill="currentColor"
                                 class="bi bi-balloon-heart"
                                 viewBox="0 0 16 16" style="padding-bottom: 2px;">
                                <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"/>
                            </svg>
                            Личный кабинет
                        </a>
                    </li>
                    <li class="<?= ADMIN_PREFIX . '/genres/' ? "active" : "" ?>">
                        <a href="<?= MAIN_PREFIX ?>/admin/genres/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" fill="currentColor" class="bi bi-basket"
                                 viewBox="0 0 16 16" style="padding-bottom: 2px;">
                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            Жанры
                        </a>
                    </li>
                    <li class="<?=  ADMIN_PREFIX . '/books/' ?>">
                        <a href="<?= MAIN_PREFIX ?>/admin/books/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16"
                                 style="padding-bottom: 2px;">
                                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
                            </svg>
                            Товары
                        </a>
                    </li>
                    <li>
                        <a href="<?= MAIN_PREFIX ?>/reg/logout/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"
                                 style="padding-bottom: 2px;">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Выйти
                        </a>
                    </li>
                </ul>
            </div>