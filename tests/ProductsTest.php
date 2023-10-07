<?php

namespace App\Tests;

use App\Entity\Product;

class ProductsTest extends DatabaseDependantTestCase
{
    /** @test */
    public function a_product_can_be_created()
    {
        // SETUP
        $name = "product name";
        $description = "product description";

        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice(94400);

        // DO SOMETHING
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        // MAKE ASSERTION
        $this->assertDatabaseHas(Product::class,
            ['name' => $name, 'description' => $description]
        );

        $this->assertDatabaseNotHas(Product::class,
            ['name' => $name, 'description' => 'foobar']
        );

    }
}