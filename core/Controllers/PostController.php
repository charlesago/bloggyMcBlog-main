<?php

namespace Controllers;



use App\File;
use Attributes\DefaultEntity;
use Entity\Comment;
use Entity\Post;

#[DefaultEntity(entityName: Post::class)]
class PostController extends AbstractController
{



    public function index(){



        return $this->render("posts/index", [
            "posts"=>$this->repository->findAll(),
            "pageTitle"=>"accueil du blog"
        ]);


    }

    public function show()
    {
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }




        $post = $this->repository->findById($id);

        if(!$post){ return $this->redirect();}

        $commentRepository = $this->getRepository(Comment::class);


        $comments = $commentRepository->findAllByPost($post);

       return $this->render("posts/post", [
            "post"=>$post,
            "comments"=>$comments,
            "pageTitle"=>$post->getTitle()
        ]);




    }

    public function remove(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }
        if($id){

            $post = $this->repository->findById($id);
        }

            if($post){

                $this->repository->delete($post);

            }

            // reparer ca la juste en dessous

           return $this->redirect();




    }

    public function create(){



        $title = null;
        $content=null;

        if( !empty($_POST['title'])){
            $title = $_POST['title'];
        }
        if( !empty($_POST['content'])){
            $content = $_POST['content'];
        }

        if($title && $content){

            $image = new File('postImage');
            if($image->isImage()){
                $image->upload();
            }

            $post = new Post();

            $post->setTitle($title);
            $post->setContent($content);
            $post->setImage($image->getName());




            $this->repository->insert($post);


            return $this->redirect();

        }
        return $this->render("posts/create", ["pageTitle"=>"nouveau post"]);
    }

    public function change(){
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }
        if($id){



            $post = $this->repository->findById($id);

            if(!$post){
                return $this->redirect();
            }

        }

        $id = null;
        $content = null;
        $title = null;

        if(!empty($_POST['contentUpdate'])){
            $content = $_POST['contentUpdate'];
        }if(!empty($_POST['titleUpdate'])){
            $title = $_POST['titleUpdate'];
        }if(!empty($_POST['idUpdate'])){
            $id = $_POST['idUpdate'];
        }

        if($content && $id && $title){



            $post = $this->repository->findById($id);

            $post->setTitle($title);
            $post->setContent($content);

            $this->repository->update($post);

            return $this->redirect([
                "type"=>"post",
                "action"=>"show",
                "id"=>$post->getId()
            ]);




        }
        return $this->render("posts/update",
            ["post"=>$post,
                "pageTitle"=>"modifier le post"]);


    }



}