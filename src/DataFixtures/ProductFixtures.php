<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public const PRODUCT_ANE_PELUCHE = 'PRODUCT_ANE_PELUCHE';

    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setName('Ane en peluche');
        $product->setPrice(12.99);
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_PELUCHES));
        $manager->persist($product);
        $this->addReference(self::PRODUCT_ANE_PELUCHE, $product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
