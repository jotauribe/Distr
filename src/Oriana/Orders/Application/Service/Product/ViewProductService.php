<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 20:36
 */

namespace Oriana\Orders\Application\Service\Product;


use Dstr\Domain\Model\Product\ProductId;
use Dstr\Domain\Model\Product\ProductRepository;

class ViewProductService
{
    private $productRepository;

    /**
     * ViewProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function execute(ViewProductRequest $request = null){
        $productId = new ProductId($request->productId());
        return $this->productRepository->productOfId($productId);
    }
}