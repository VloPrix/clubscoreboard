<?php

class verify{
    public static function isInt($id) {
        if (!preg_match("^[0-9]^", $id)) {
            return false;
        }
        return true;
    }
}
