<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 18:57
 */

namespace Oriana\Orders\Application\Service\Product;


use Dstr\Domain\Model\Product\Product;
use Dstr\Domain\Model\Product\ProductId;
use Dstr\Domain\Model\Product\ProductRepository;

class AddProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(AddProductRequest $request)
    {
        $product = new Product(
            new ProductId(),
            $request->name(),
            $request->price()
        );

        $this->productRepository->add($product);
    }
}