<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 16:36
 */

namespace Dstr\Domain\Model\Product;


interface ProductRepository
{
    public function productOfId(ProductId $productId);

    public function productOfName(string $name);

    public function add(Product $product);

    public function remove(Product $product);
}