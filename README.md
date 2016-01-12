yii2-dual-listbox
=================

Dual Listboxt for Yii framework 2.0.

Description
-----------

**softark\duallistbox\DualListbox** widget is a Yii 2 wrapper for [Bootstrap Dual Listbox](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox).

Requirements
------------
+ Yii Version 2.0.0 or later

Usage
-----
1. Add `softark/yii2-dual-listbox` in your project's `composer.json`, and let Composer configure your project.

    ```php
    "require": {
        "php": ">=5.4.0",
        "yiisoft/yii2": "*",
        "yiisoft/yii2-bootstrap": "*",
        "yiisoft/yii2-swiftmailer": "*",
        "softark/yii2-dual-listbox": "dev-master"
    },
    ```

2. Use `softark\duallistbox\DualListbox::widget()` in place of `yii\helpers\Html::listBox()`, `yii\helpers\Html::activeListBox()`, or `yii\widgets\ActiveField::listBox()` in your view.

    1. Replacing `Html::listBox()` using `name` and `selection`

        ```php
        use softark\duallistbox\DualListbox;
        ...
        <?php
            $options = [
                'multiple' => true,
                'size' => 20,
            ];
            // echo Html::listBox($name, $selection, $items, $options);
            echo DualListbox::widget([
                'name' => $name,
                'selection' => $selection,
                'items' => $items,
                'options' => $options,
                'clientOptions' => [
                    'moveOnSelect' => false,
                    'selectedListLabel' => 'Selected Items',
                    'nonSelectedListLabel' => 'Available Items',
                ],
            ]);
        ?>
        ```

    2. Replacing `Html::activeListBox()` using `model` and `attribute`

        ```php
        use softark\duallistbox\DualListbox;
        ...
        <?php
            $options = [
                'multiple' => true,
                'size' => 20,
            ];
            // echo Html::activeListBox($model, $attribute, $items, $options);
            echo DualListbox::widget([
                'model' => $model,
                'attribute' => $attribute,
                'items' => $items,
                'options' => $options,
                'clientOptions' => [
                    'moveOnSelect' => false,
                    'selectedListLabel' => 'Selected Items',
                    'nonSelectedListLabel' => 'Available Items',
                ],
            ]);
        ?>
        ```

    3. Replacing `ActiveField::listBox()`

        ```php
        use softark\duallistbox\DualListbox;
        ...
        <?php
            $options = [
                'multiple' => true,
                'size' => 20,
            ];
            // echo $form->field($model, $attribute)->listBox($items, $options);
            echo $form->field($model, $attribute)->widget(DualListbox::className(),[
                'items' => $items,
                'options' => $options,
                'clientOptions' => [
                    'moveOnSelect' => false,
                    'selectedListLabel' => 'Selected Items',
                    'nonSelectedListLabel' => 'Available Items',
                ],
            ]);
        ?>
        ```

3. Collect the user input in the server side, just as you do with a single Listbox with multiple selection.

   Note that the input value of the ListBox with multiple selection will be an array.
   
   If you find difficulty in the handling of the user input, please read [A Sample Code](sample-code.md) which demonstrates how to use a dual listbox. 


Properties of softark\duallistbox\DualListbox
---------------------------------------------

1. **name** @var string

    The input name.

2. **selection** @var array

    The selected values.

3. **model** @var yii\base\Model

    The model object.

4. **attribute** @var string

    The attribute name.

5. **items** @var array

    The option data items. The array keys are option values, and the array values are the corresponding option labels. 

6. **options** @var array

   The tag options for the listbox in terms of name-value pairs.

7. **clientOptions** @var array

   The options for the Bootstrap Dual Listbox in terms of name-value pairs.
   See [Initialzation parameters object](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox/blob/master/README.md#initialization-parameters-object) section of the official documentation of [Bootstrap Dual Listbox](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox).

The first 6 properties correspond to the parameters used in `Html::listBox()`, `Html::activeListBox()` and `ActiveField::listBox()`.

Note that you have to use either `name`-`selection` pair or `model`-`attribute` pair. The former is for replacing `Html::listBox()` and the latter is for `Html::activeListBox()` and `ActiveField::listBox()`.


History
-------

+ Version 1.0.0 (2016-01-12)
    + Tested on Yii 2.0.6
