<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 13:27
 */

namespace App\Models;


use Core\Model;

class Storage extends Model {

    public $table = 'products';


    public function buy ($id, $qty){
        $product = $this->findOne('id', $id);
        var_dump($product);
    }
}
