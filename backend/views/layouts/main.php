<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

$language = \Yii::$app->params['language'];

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrap bg-info">
        <?php
        NavBar::begin([
            'brandLabel' => 'My Company',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
            'class' => 'navbar-inverse navbar-static-top',
            ],
            ]);
        $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
                )
            . Html::endForm()
            . '</li>';
        }
        $menuItems[] = [
            'label' => Yii::t('app','Language'),
            'items' => [
                [
                  'label' => '<img src="'.Url::base().'/img/country/Viet Nam.png" ><span> Tiếng Việt</span>', 
                  'url' => ['language/set','language'=>'vi'],
                  'active' => $language == 'vi'
                ],
                [
                  'label' => '<img src="'.Url::base().'/img/country/United States of America.png" ><span> English</span>', 
                  'url' => ['language/set','language'=>'en'],
                   'active' => $language == 'en'
                ],
            ]

        ];
        
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
            'encodeLabels' => false,
            ]);
        NavBar::end();
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 aside-left bg-info">
                 <div class="panel panel-primary">
                     <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-home"></span> Index',['/site']); ?></li>
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-user"></span> USER',['/user']); ?></li>
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-th-list"></span> '.\Yii::t('app', 'booking'),['/book']); ?></li>
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-th-list"></span> '.\Yii::t('app', 'deposit'),['/deposit']); ?></li>
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-th-list"></span> '.\Yii::t('app', 'milestone'),['/milestone']); ?></li>
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-th-list"></span> '.\Yii::t('app', 'properties'),['/properties']); ?></li>
                            <li class="list-group-item"><?php echo Html::a('<span class="glyphicon glyphicon-th-list"></span> '.\Yii::t('app', 'subProperties'),['/sub-properties']); ?></li>
                        </ul>
                            </div>
                </div> 
            </div>
            <div class="col-md-10 admin-right">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>

                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; VitaGroup Company <?= date('Y') ?></p>

        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
