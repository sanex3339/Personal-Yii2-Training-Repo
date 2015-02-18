<?php
namespace sanex\catalog\models;

use \yii\db\Expression;

class Catalog extends \yii\db\ActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comments the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'catalog';
    }
 
    /**
     * @return array primary key of the table
     **/     
    public static function primaryKey()
    {
        return array('id');
    }
 
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Имя',
            'info' => 'Описание',
            'color' => 'Цвет',
            'country' => 'Страна',
            'size' => 'Размер',
            'price' => 'Цена',
        );
    }
    
    public function rules()
    {
        return [
            //[['title', 'content'], 'required'],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {

        }    
     
        return parent::beforeSave($insert);
    }
}