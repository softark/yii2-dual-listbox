yii2-dual-listbox
=================

Dual Listboxt for Yii framework 2.0.

Description
-----------

**softark\duallistbox\DualListbox** widget is a Yii 2 wrapper for [Bootstrap Dual Listbox](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox).

It works with bootstrap 3, 4, or 5

Requirements
------------
+ Yii Version 2.0.0 or later
+ yii2-bootstrap, yii2-bootstrap4 or yii2-bootstrap5
+ istvan-ujjmeszaros/bootstrap-duallistbox v.3.0.x or v.4.0.x

Usage
-----
1. Add `softark/yii2-dual-listbox` and `istvan-ujjmeszaros/bootstrap-duallistbox` in your project's `composer.json`, and let Composer configure your project.

    + You have to use a different version of `istvan-ujjmeszaros/bootstrap-duallistbox` depending on the bootstrap version.
    + For bootstrap 3, use `~3.0.0` : 
    ```php
    "require": {
        "php": ">=7.0.0",
        "yiisoft/yii2": "*",
        "yiisoft/yii2-bootstrap": "*",
        "istvan-ujjmeszaros/bootstrap-duallistbox": "~3.0.0",
        "softark/yii2-dual-listbox": "dev-master"
    },
    ```
    * For bootstrap 4 and 5, use `~4.0.0`:
    ```php
    "require": {
        "php": ">=7.0.0",
        "yiisoft/yii2": "*",
        "yiisoft/yii2-bootstrap4": "*", // OR
        "yiisoft/yii2-bootstrap5": "*",
        "istvan-ujjmeszaros/bootstrap-duallistbox": "~4.0.0",
        "softark/yii2-dual-listbox": "dev-master"
    },
    ```
 
4. Use `softark\duallistbox\DualListbox::widget()` in place of `yii\helpers\Html::listBox()`, `yii\helpers\Html::activeListBox()`, or `yii\widgets\ActiveField::listBox()` in your view.

   1. Replacing **Html::listBox()** using **name and selection**
           
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

   2. Replacing **Html::activeListBox()** using **model and attribute**

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

   3. Replacing **ActiveField::listBox()** using **model and attribute**

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

3. Collect the user input in the server side, just as you do with a single Listbox with multiple selection. Note that the input value will be an array.
   
   If you find difficulty in handling the user input, please read [A Sample Code](sample-code.md) which demonstrates how to use a dual listbox to the data in array format. 


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
   See [Initialzation parameters object](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox/blob/master/README.md#initialization-parameters-object) section of the official documentation of [Bootstrap Dual Listbox](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox) for details.

The first 6 properties correspond to the parameters used in `Html::listBox()`, `Html::activeListBox()` and `ActiveField::listBox()`.

Note that you have to use either **name-selection** pair or **model-attribute** pair. The former is for replacing `Html::listBox()` and the latter is for `Html::activeListBox()` and `ActiveField::listBox()`.

Notice
------

For some reason, [Bootstrap Dual Listbox](https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox)
**doesn't work in mobile device browsers**, and so you can not 
use this widget for them.

Consider using checkbox list instead. 

History
-------

+ Version 1.0.0 (2016-01-12)
    + Tested on Yii 2.0.6
+ Version 1.0.1 (2020-09-18)
    + Supports both bootstrap3 and bootstrap4
+ Version 1.0.2 (2022-09-08)
    + Supports also bootstrap5
