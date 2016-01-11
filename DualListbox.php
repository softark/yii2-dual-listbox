<?php

namespace softark\duallistbox;

use yii\widgets\InputWidget;
use yii\helpers\Html;

/**
 *  yii2-dual-list-box Widget
 *
 * @author Nobuo Kihara <softark@gmail.comu>
 * @since 1.0
 */
class DualListbox extends InputWidget
{
    /**
     * @var array listbox items
     */
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
    }
}
