A Sample Code
=============

The following is the code that constructs a page that gathers a user's favorite foods.

Here are 4 models involved in this page.

1. User extends ActiveRecord

   id
   name
   ...
   etc.
   
2. Food extends ActiveRecord

   id
   name
   ...
   etc.

3. FavoriteFood extends ActiveRecord

   user_id
   food_id

4. UserFovorites extends Model

   user_id
   food_ids

Note that the last one is **not** an ActiveRecord, and **'food_ids' attribute is an array** of food ids. We use this model for the form of the page.

Model
-----

Please take note that `EachValidator` is used to validate the array of `food_ids` attribute.

    ```php
    class UserFavorites extends Model
    {
        /**
         * @var integer
         */
        $user_id;

        /**
         * @var array IDs of the favorite foods
         */
        $food_ids = [];
        
        /**
         * @return array the validation rules.
         */
        public function rules()
        {
            return [
                // user_id is  required
                ['user_id', 'required'],
                // user_id must exist in user table
                ['user_id', 'exist', 'targetClass' => User::className(), 'targetAttribute' => 'id'],
                // each food_id must exist in food table
                ['food_ids', 'each', 'rule' => [
                    'exist', 'targetClass' => Food::className(), 'targetAttribute' => 'id'
                ]],
            ];
        }

        /**
         * @return array customized attribute labels
         */
        public function attributeLabels()
        {
            return [
                'user_id' => 'User',
                'food_ids' => 'Favorite Foods',
            ];
        }

        /**
         * load the user's favorite foods
         */
        public function loadFavorites()
        {
            $this->food_ids = [];
            $favfoods = FavoriteFood::find()->where(['user_id' => $this->user_id])->all();
            foreach($favfoods as $ff) {
                $this->food_ids[] = $ff->food_id;
            }
        }

        /**
         * save the user's favorite foods
         */
        public function saveFavorites()
        {
            FavoriteFood::deleteAll(['user_id' => $this->user_id]);
            if (is_array($this->food_ids)) {
                foreach($this->food_ids as $food_id) {
                    $ff = new FavoriteFood();
                    $ff->user_id = $this->user_id;
                    $ff->food_id = $food_id;
                    $ff->save();
                }
            }
            /* Be careful, $this->food_ids can be empty */
        }

        /**
         * @return array available foods
         */
        public static function getAvailableFoods()
        {
            $foods = Food::find()->order('name')->asArray()->all();
            $items = ArrayHelper::map($foods, 'id', 'name');
            return $items;
        }
    }
    ```

Controller
----------

    ```php
    public function actionFavoriteFood($user_id)
    {
        $model = new UserFavorites();
        $model->user_id = $user_id;
        
        if ($model->load(Yii::$app->request->post()) {
            if ($model->validate()) {
                $model->saveFavorites();
                return $this->redirect(['index']);
            }
        }
        $model->loadFavorites();
        $items = UserFavorites::getAvailableFoods();
        return $this->render('favorite', [
            'model' => $model,
            'items' => $items,
        ]);
    }
    ```

View
----

    ```php:favorite.php
    <?php $form = ActiveForm::begin([
        'id' => 'favorite-form',
        'enableAjaxValidation' => false,
    ]); ?>

    <?= Html::activeHiddenInput($model, 'user_id') ?>

    <?php echo $form->field($model, 'food_ids')->widget(DualListbox::className(),[
            'items' => $items,
            'options' => [
                'multiple' => true,
                'size' => 15,
            ],
            'clientOptions' => [
                'nonSelectedListLabel' => 'Available Foods',
                'selectedListLabel' => 'Favorite Foods',
                'moveOnSelect' => false,
            ],
        ])
        ->hint('Select the favorite foods.');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Update', [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
    ```
