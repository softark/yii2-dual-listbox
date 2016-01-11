<?php

namespace softark\duallistbox;

use yii\web\AssetBundle;

/**
 * Asset bundle for yii2-dual-list-box Widget
 *
 * @author Nobuo Kihara <softark@gmail.comu>
 * @since 1.0
 */
class DualListboxAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
