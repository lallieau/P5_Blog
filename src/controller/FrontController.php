<?php

namespace App\src\controller;


use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home',[
            'articles' => $articles
        ]);

    }

    public function articlesPage()
    {
        $articles = $this->articleDAO->getArticles();

        return $this->view->render('articles_page', [
            'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);

        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function addComment(Parameter $post, $articleId)
    {
        if ($post->get('submit'))
        {
            $errors = $this->validation->validate($post, 'Comment');
            $article = $this->articleDAO->getArticle($articleId);

            if (!$errors)
            {

                $this->commentDAO->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: index.php');

            }

            $comments = $this->commentDAO->getCommentsFromArticle($articleId);

            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function contactPage()
    {
        return $this->view->render('contact');
    }

    public function newContact(Parameter $post)
    {
        if ($post->get('submit'))
        {
            $errors = $this->validation->validate($post, 'Contact');

            if (!$errors)
            {
                $this->contactDAO->newContact($post);
                $this->session->set('contact', 'Votre message a bien été envoyé');
                header('Location: index.php');
            }
            return $this->view->render('contact', [
                'errors' => $errors
            ]);
        }
    }

    public function register(Parameter $post)
    {
        if ($post->get('submit'))
        {
            $errors = $this->validation->validate($post, 'User');
            if ($this->userDAO->checkUser($post))
            {
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }
            if (!$errors)
            {
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: index.php?route=profile');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit'))
        {
            $result = $this->userDAO->login($post);
            if ($result && $result['isPasswordValid'])
            {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo',$post->get('pseudo'));
                header('Location: index.php?route=profile');
            }
            else
            {
              $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
              return $this->view->render('login',[
                  'post' => $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}