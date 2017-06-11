<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 16:35
 */

namespace Dstr\Infrastructure\Domain\Model\Product;


use Doctrine\ORM\EntityRepository;
use Dstr\Domain\Model\Product\Product;
use Dstr\Domain\Model\Product\ProductId;
use Dstr\Domain\Model\Product\ProductRepository;

class DoctrineProductRepository extends EntityRepository implements ProductRepository
{

    public function productOfId(ProductId $productId)
    {
        $this->find($productId);
    }

    public function productOfName(string $name)
    {
        return $this->findOneBy(['name' => $name]);
    }

    public function add(Product $product)
    {
        return $this->getEntityManager()->persist($product);
    }

    public function remove(Product $product)
    {
        return $this->getEntityManager()->remove($product);
    }
}