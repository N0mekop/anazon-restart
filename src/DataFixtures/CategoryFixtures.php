<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_PELUCHES = 'CATEGORY_PELUCHES';
    public function load(ObjectManager $manager): void
    {
        $jouet = new Category();
        $jouet->setTitle('Jouets');
        $manager->persist($jouet);

        $category = new Category();
        $category->setTitle('Peluches');
        $category->setParent($jouet);
        $manager->persist($category);
        $this->addReference(self::CATEGORY_PELUCHES, $category);

        $category = new Category();
        $category->setTitle('Voyages');
        $manager->persist($category);

        $manager->flush();
    }
}
