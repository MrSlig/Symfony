<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $text;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $imagePath;

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    public function getText() {
        return $this->text;
    }
    public function setText($text) {
        $this->text = $text;
        return $this;
    }
    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
        return $this;
    }
}
