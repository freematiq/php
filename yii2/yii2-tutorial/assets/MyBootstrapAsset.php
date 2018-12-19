<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';

    public $js = [
        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
    ];

    public $css = [
        'css/bootstrap.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
