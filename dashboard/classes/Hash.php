<?php
class Hash {

    public static function cook_hash() {
        return hash('haval256,4', 'All Thanks Be To Allah.');
    }
     
    public static function unique() {
        return self::cook_hash(uniqid());
    }


    public static function make_hash($string) {
        try {
            return password_hash($string, PASSWORD_BCRYPT);
        } catch (Exception $e) {
            $this->$e->getMessage();
            return false;
        }
    }

    public static function un_hash($string, $hash) {
        try {
            if (password_verify($string, $hash)) {
                return true;
            } else {
                return false;
            }
        } catch(Exception $e) {
            $this->$e->getMessage();
            return false;
        }
    }

}
