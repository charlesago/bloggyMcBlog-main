<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\AbstractEntity;
use Entity\Post;

#[DefaultEntity(entityName: Post::class)]
class HomeController extends AbstractController
{

    public function index()
    {






        return $this->render("home/index", ["pageTitle"=>"home"]);
    }

}