<?php

namespace App\DataFixtures;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // ini_set('memory_limit', '2048M'); // or you could use 1G
        for($i = 1; $i<= 200; $i++){
            $movie = new Movie();
            $movie->setTitle("Title of movie".$i);
            $movie->setDescription("Description of movie".$i *3.1416);
            $movie->setReleaseDate((new \DateTime())->modify("+ $i days"));
            $manager->persist($movie);
            
        }
        $manager->flush();
        // $product = new Product();
        // $manager->persist($product);

        
    }



}
