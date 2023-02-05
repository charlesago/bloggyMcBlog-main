<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Post;


#[TargetEntity(entityName: Post::class)]

class PostRepository extends AbstractRepository
{



    public function insert(\Entity\Post $post){
        $request = $this->pdo->prepare("INSERT INTO {$this->tableName} SET title = :title, content = :content, image= :image");


        $request->execute([
            "title"=> $post->getTitle(),
            "content"=>$post->getContent(),
            "image"=>$post->getImage()
        ]);
    }

    public function update(\Entity\Post $post){
        $requete = $this->pdo->prepare("UPDATE {$this->tableName} SET content = :content, title= :title WHERE id = :id");
        $requete->execute([
            'id'=>$post->getId(),
            'content'=>$post->getContent(),
            'title'=>$post->getTitle()
        ]);
    }
}