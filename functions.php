<?php

/**
 * checkField: function to trim a field and check 
 * if the number of character is higher than $nbreChar
 *
 * @param  string $fieldName
 * @param  string $fieldValue
 * @param  int $nbreChar : number of charater: default 0
 * @return string
 */
function checkField(string $fieldName,string $fieldValue, int $nbreChar = -1){
    $value = trim($fieldValue);
    if(strlen($value) > $nbreChar){
       return $value;
    }else{
      
        throw new Exception( "$fieldName field is required", 406);
    }
}