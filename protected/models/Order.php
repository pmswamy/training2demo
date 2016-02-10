<?php

/**
 * This is the model class for table "tbl_order".
 *
 * The followings are the available columns in table 'tbl_order':
 * @property integer $order_id
 * @property integer $order_product_id
 * @property integer $order_customer_id
 * @property string $order_amount
 *
 * The followings are the available model relations:
 * @property Customer $orderCustomer
 * @property Product $orderProduct
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_product_id, order_customer_id, order_amount', 'required'),
			array('order_product_id, order_customer_id', 'numerical', 'integerOnly'=>true),
			array('order_amount', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_id, order_product_id, order_customer_id, order_amount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orderCustomer' => array(self::BELONGS_TO, 'Customer', 'order_customer_id'),
			'orderProduct' => array(self::BELONGS_TO, 'Product', 'order_product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => 'Order',
			'order_product_id' => 'Order Product',
			'order_customer_id' => 'Order Customer',
			'order_amount' => 'Order Amount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('order_product_id',$this->order_product_id);
		$criteria->compare('order_customer_id',$this->order_customer_id);
		$criteria->compare('order_amount',$this->order_amount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
