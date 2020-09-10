<?php

namespace App\DataFixtures;
use App\Entity\Movie;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            "Terror", "Romance", "Comedy", "Action", "Sci-Fi", "Adventure"
        ];
        foreach($categories as $item){
            $category = new Category();
            $category->setName($item);
            $manager->persist($category);
        }
        $manager->flush();

        // ini_set('memory_limit', '2048M'); // or you could use 1G
        for($i = 1; $i<= 200; $i++){

            $categories = $manager->getRepository(Category::class)->findAll();
            $category = array_rand($categories);
            $movie = new Movie();
            $movie->setCategory($categories[$category]);
            $movie->setTitle("Title of movie".$i);
            $movie->setDescription("Description of movie".$i *3.1416);
            $movie->setReleaseDate((new \DateTime())->modify("+ $i days"));
            $manager->persist($movie);          
        }
        $manager->flush();
    }



}
