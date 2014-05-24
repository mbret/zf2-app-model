<?php
namespace Blog\Controller;

use Blog\Entity\Post;
use Blog\Form\PostFieldset;
use Blog\Form\PostForm;

class PostController extends EntityUsingController
{

    public function indexAction() {
        
        $repository = $this->getEntityManager()->getRepository('Blog\Entity\Post');
        $posts      = $repository->findAll();

        return array(
          'posts' => $posts
        );
    }

    public function addAction() {

        $post = new PostFieldset( $this->getEntityManager() );
        $form = new PostForm();
        $form->bind($post);

        return array(
            'form' => $form
        );
    }

    public function editAction() {}

    public function deleteAction() {}
}