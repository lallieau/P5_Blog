<?php
namespace App\src\controller;

use App\config\Request;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;
use App\src\DAO\ContactDAO;
use App\src\model\View;
use App\src\constraint\Validation;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;
    protected $contactDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->contactDAO = new ContactDAO();


        $this->view = new View();
        $this->request = new Request();
        $this->validation = new Validation();

        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}