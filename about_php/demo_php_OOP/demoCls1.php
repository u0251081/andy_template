<?php
/**
 * Created by PhpStorm.
 * User: andychen
 * Date: 7/10/18
 * Time: 11:32 PM
 */
class demoCls1 {
    public function __construct($para = null) {
        if (!empty($para)) {
            foreach ($para as $k => $v) {
                $this->$k = $v;
            }
        } else {
            $this->name = 'newName';
            $this->action = 'newAction';
        }
    }
}
?>