<?php
class Validate{
    private $_errors = array(),
            $_DB = null,
            $_passes = false;

    public function __construct(){
        $this->_DB = DB::getInstance();
    }

    public function check($source,$items=array()){
        foreach($items as $field=>$rules){
           $value = trim($source[$field] ?? '') ;
            foreach($rules as  $ruleType => $ruleValue){
                if($ruleType == 'required' && empty($value)){
                    $this->addError("{$field} is required");
                }else{
                     switch($ruleType){
                        case 'min':
                                    if(strlen($value) < $ruleValue){
                                        $this->addError("{$field} must be more then {$ruleValue} charactors");
                                    }
                            break;
                        case 'max':
                                    if(strlen($value) > $ruleValue){
                                        $this->addError("{$field} must be less then {$ruleValue} charactors");
                                    }
                            break;
                        case 'matches':
                                        if($source[$ruleValue] !== $value){
                                            $this->addError("{$field} should be match with {$ruleValue}");
                                        }
                            break;

                        case 'unique':
                                if(  $this->_DB->get('user', array($field, '=', $value))->count()){
                                        $this->addError("{$field} must be unique");
                                }
                            break;

                    }
                }
             

            }
        }
        if(count($this->_errors) < 1){
            $this->_passes = true;
        }
    }

    private function addError($error){
        array_push($this->_errors, $error);
    }

    public function getErrors(){
        return $this->_errors;
    }

    public function getPass(){
        return $this->_passes;
    }

}