<?php

namespace SugarAPI\SDK\EntryPoint\POST;

use SugarAPI\SDK\EntryPoint\Abstracts\POST\AbstractPostFileEntryPoint;
use SugarAPI\SDK\Exception\EntryPoint\RequiredOptionsException;

class ModuleRecordFileField extends AbstractPostFileEntryPoint {

    /**
     * @inheritdoc
     */
    protected $_URL = '$module/$record/file/$field';

    /**
     * @inheritdoc
     */
    protected $_DATA_TYPE = 'array';

    /**
     * @inheritdoc
     */
    protected $_REQUIRED_DATA = array(
        'format' => 'sugar-html-json',
        'delete_if_fails' => FALSE
    );

    /**
     * Allow for shorthand calling of attachFile method.
     * Users can simply submit the File in via string, or pass the filename => path
     * @param $data
     * @throws RequiredOptionsException
     */
    protected function configureData($data){
        if (!empty($this->Options)){
            $fileField = end($this->Options);
        }else{
            throw new RequiredOptionsException(get_called_class());
        }
        if (is_string($data) && isset($fileField)){
            $data = array(
                $fileField => $data
            );
        }
        if (is_array($data)){
            if (isset($fileField)){
                $data[$fileField] = $this->setFileFieldValue($data[$fileField]);
            }else{
                foreach ($this->Data as $key => $value){
                    if (!array_key_exists($key,$this->_REQUIRED_DATA)){
                        $data[$key] = $this->setFileFieldValue($value);
                    }
                }
            }
        }
        parent::configureData($data);
    }

    /**
     * Configure the filepath to have an @ symbol in front if one is not found
     * @param string $value
     * @return string
     */
    protected function setFileFieldValue($value){
        if (strpos($value, '@')===FALSE){
            $value = '@'.$value;
        }
        return $value;
    }

}