<?php

/** @var \yii\web\View $this */
/** @var string $content */
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl ?>" class="brand-link">
        <!-- <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">
            <?= Yii::$app->name ?>
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->fullName ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Działy (TODO)',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['/site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Login', 'url' => ['/site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Register', 'url' => ['/site/register'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Administracja', 'header' => true],

                    [
                        'label' => 'Narzędzia',
                        'icon' => 'cogs',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Użytkownicy', 'icon' => 'file-code-o', 'url' => ['/admin/user/'],],
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            ['label' => 'Zdarzenia', 'icon' => 'dashboard', 'url' => ['/log/log/'],],
                            // ['label' => 'Zmiany', 'icon' => 'dashboard', 'url' => ['/logEvent'],],
                            // ['label' => 'Logowania', 'icon' => 'dashboard', 'url' => ['/log/loginhistory'],],
                            [
                                'label' => 'RBAC',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Rule', 'icon' => 'circle-o', 'url' => ['/rbac/rule'],],
                                    ['label' => 'Role', 'icon' => 'circle-o', 'url' => ['/rbac/role'],],
                                    ['label' => 'Routes', 'icon' => 'circle-o', 'url' => ['/rbac/route'],],
                                    ['label' => 'Assignment', 'icon' => 'circle-o', 'url' => ['/rbac/assignment'],],
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>