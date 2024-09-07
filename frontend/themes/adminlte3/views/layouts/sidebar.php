<aside class="main-sidebar sidebar-dark-navy elevation-4" style="background-color: #050A30;">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    /*
                    [
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    */
                    ['label' => 'Create Course ', 'url' => ['course/create'],'icon' => 'edit' , 'visible' => !Yii::$app->user->isGuest ],
                    
                    //['label' => 'user', 'url' => ['users/index'],'icon' => 'sitemap'],
                    //['label' => 'product', 'url' => ['product/index'],'icon' => 'sitemap'],
                    //['label' => 'course', 'url' => ['course/index'],'icon' => 'sitemap'],

                    ['label' => 'Setting', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Analysis', 'url' => '/site/index3', 'icon' => 'users', 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'for admin', 'header' => true],
                   
                   ['label' => 'Chang invoice',  'icon' => 'file-code', 'url' => ['invoice/index'], 'target' => '_blank'],
                   ['label' => 'Chang enroll',  'icon' => 'file-code', 'url' => ['enroll/index'], 'target' => '_blank'],
                   ['label' => 'Chang users',  'icon' => 'file-code', 'url' => ['users/index'], 'target' => '_blank'],
                   ['label' => 'Chang course',  'icon' => 'file-code', 'url' => ['course/index'], 'target' => '_blank'],
                    //['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    //['label' => 'MULTI LEVEL', 'header' => true],
                    /*
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                    */
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>