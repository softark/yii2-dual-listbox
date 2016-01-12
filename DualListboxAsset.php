<?php

namespace softark\duallistbox;

use yii\web\AssetBundle;

/**
 * Asset bundle for yii2-dual-listbox Widget
 *
 * @author Nobuo Kihara <softark@gmail.comu>
 * @since 1.0
 */
class DualListboxAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/istvan-ujjmeszaros/bootstrap-duallistbox/dist';

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (YII_DEBUG) {
            $this->js = [
                'jquery.bootstrap-duallistbox.js',
            ];
            $this->css = [
                'bootstrap-duallistbox.css',
            ];
        } else {
            $this->js = [
                'jquery.bootstrap-duallistbox.min.js',
            ];
            $this->css = [
                'bootstrap-duallistbox.min.css',
            ];
        }
        parent::init();
    }
}
