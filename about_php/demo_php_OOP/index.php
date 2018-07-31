<textarea style="width: 800px; height: 450px;" readonly>
<?php
/**
 * Created by PhpStorm.
 * User: andychen
 * Date: 7/10/18
 * Time: 11:31 PM
 */
include_once 'demoCls1.php';
$something1 = new demoCls1();
print 'implement a object without parameter'."\n";
print_r($something1);
$object_data = array(
    'para1' => '001',
    'para2' => 002,
    'para3' => 0.03
);
$something2 = new demoCls1($object_data);
print 'implement a object with parameter'."\n";
print_r($something2);

class example_normal {
    public    $val1; // 所有使用此 class 的人都可以存取 * default
    protected $val2; // 所有繼承此 class 的人都可以存取
    private   $val3; // 除了累別本身，無人可以存取
    const constant_value = 'something';

    public static $val4; // 在權限之後加入 static 使其為靜態變數
    /* 靜態變數意即類別並沒有實體就存在 */

    public    function function1() {} // function 也是如同變數
    protected function function2() {} // 可加入權限修飾
    private   function function3() {} // 可加入靜態修飾

}

abstract class example_abstract {
    public    $val1; // 所有使用此 class 的人都可以存取 * default
    protected $val2; // 所有繼承此 class 的人都可以存取
    private   $val3; // 除了累別本身，無人可以存取
    const constant_value = 'something';

    public static $val4; // 在權限之後加入 static 使其為靜態變數
    /* 靜態變數意即類別並沒有實體就存在 */

    public    function function1() {} // function 也是如同變數
    protected function function2() {} // 可加入權限修飾
    private   function function3() {} // 可加入靜態修飾

    abstract public    function function4(); // abstract function 不可實作
    abstract protected function function5(); // abstract function 可為 protected
    //abstract private   function function6(); // abstract function 不可為 private
}

abstract class example_abstract_extended extends example_abstract {
    // abstract class 可繼承 abstract class
    // abstract class 或 class 都只能繼承 1 個 class
}

class example_implement_extended_abstract extends example_abstract_extended {
    public function function4() {

    }
    protected function function5() {

    }
}

class example_implement_abstract extends example_abstract {
    /*
     * if extended a abstract class and it has abstract function
     * then must implement them.
     */
    public function function4() { // private never lower then original function
        // doing something
    }

    protected function function5() {
        // doing something
    }

}

interface example_interface1 {
    //const constant_value = 'this is interface1';
    const constant_value1 = 'this is interface1';
    /*
     * public    $val1;
     * protected $val2;
     * private   $val3;
     *
     * public static $val4;
     */
    public    function function1(); // every function in interface is abstract
    /*
     * protected function function2(); // interface can't been extended, so this will nobody could access
     * private   function function3(); // interface can't implement any function, so this will useless
     *
     * public    function function4() { // so you can't implement any function
     *   // doing something...
     * }
     */
    public function function3();
}

interface example_interface2 {
    //const constant_value = 'this is interface2';
    const constant_value2 = 'this is interface2';
    public function function2();
    // protected function function3();
    public function function3();
}

class example_implement_interface implements example_interface1, example_interface2 {
    // 注意若實作 interface 皆有定義 const 則命名不可重複
    public function function1() {
        print constant_value1."\n";
    }
    public function function2() {
        print constant_value2."\n";
    }
    // 實作多個 interface 時，可以有同名 function
    // 但其權限需一致
    public function function3() {

    }
}
print "\n";
$normal = new example_normal(); // 一般類別皆可實做
print_r($normal);
print "\n";
$abstract = new example_implement_abstract();
print_r($abstract);
// allow_string set to false is prevent class_name does not exists.
print is_a($abstract, example_abstract, false)? 'true':'false';
print "\n";
print "\n";
$interface = new example_implement_interface();
print_r($interface);
print is_a($interface, example_interface1, false)? 'is interface1':'not interface1';
print "\n";
print is_a($interface, example_interface2, false)? 'is interface2':'not interface2';
print "\n";
print ($interface instanceof example_interface1)? 'instanceof interface1':'not instanceof interface1';
print "\n";
print ($interface instanceof example_interface2)? 'instanceof interface2':'not instanceof interface2';
print "\n";
// $abstract = new example_abstract(); abstract 類別不可實作
print "\n";
$alternative = new example_implement_extended_abstract();
print_r($alternative);
print is_a($alternative,example_abstract,false)? 'is example_abstract':'not example_abstract';
print "\n";

print 'demo namespace';
print "\n";

require_once 'collectOne/example_same_name.php';
require_once 'collectTwo/example_same_name.php';

use collectOne\example_same_name as name_one;
$collectOne = new name_one();
$collectOne->express_self();
print "\n";
use collectTwo\example_same_name as name_two;
$collectTwo = new name_two();
$collectTwo->express_self();
print "\n";

?>
</textarea>
