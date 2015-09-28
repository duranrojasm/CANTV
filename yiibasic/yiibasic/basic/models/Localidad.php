<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidad".
 *
 * @property integer $idlocalidad
 * @property integer $localidad_idlocalidad
 * @property string $nombre
 * @property string $tipo
 *
 * @property Cliente[] $clientes
 * @property Estacion[] $estacions
 * @property Localidad $localidadIdlocalidad
 * @property Localidad[] $localidads
 * @property Nodo[] $nodos
 */
class Localidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['localidad_idlocalidad', 'nombre'], 'required'],
            [['localidad_idlocalidad'], 'string'],
            [['nombre'], 'string', 'max' => 50],
            [['tipo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idlocalidad' => 'Idlocalidad',
            'localidad_idlocalidad' => 'Ubicación',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['localidad_idlocalidad' => 'idlocalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacions()
    {
        return $this->hasMany(Estacion::className(), ['localidad_idlocalidad' => 'idlocalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidadIdlocalidad()
    {
        return $this->hasOne(Localidad::className(), ['idlocalidad' => 'localidad_idlocalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidads()
    {
        return $this->hasMany(Localidad::className(), ['localidad_idlocalidad' => 'idlocalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodos()
    {
        return $this->hasMany(Nodo::className(), ['localidad_idlocalidad' => 'idlocalidad']);
    }
}
