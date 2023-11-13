<?php
/*
displaying errors to form validation
*/
function display_form_errors($validation, $field)
{
    if($validation->hasError($field)){
        return $validation->getError($field);
    }
}