<?php

namespace softark\duallistbox;

use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

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
    public $items = [];

    /**
     * @var array listbox options
     */
    public $options = ['class' => 'form-control'];

    /**
     * @var array dual listbox options
     */
    public $clientOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            return Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
        } else {
            return Html::listBox($this->name, $this->value, $this->items, $this->options);
        }
    }

    /**
     * Registers the required JavaScript.
     */
    public function registerClientScript()
    {
        $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
        $view = $this->getView();
        DualListboxAsset::register($view);
        $id = (array_key_exists('id', $this->options)) ? $this->options['id'] : Html::getInputId($this->model, $this->attribute);
        $view->registerJs("jQuery('#$id').bootstrapDualListbox($options);");
    }
}
