<?php
namespace App\Controllers;
use App\Models\ArticleModel;
class Article extends BaseController
{
    public function index()
    {
        $title = "Article Lists";
        $model = new ArticleModel();
        $article = $model->findAll();
        return view("article/index", compact("article", "title"));
    }
    public function view($slug)
    {
        $model = new ArticleModel();
        $article = $model
            ->where([
                "slug" => $slug,
            ])
            ->first();
        if (!$article) {
            throw PageNotFoundException::forPageNotFound();
        }
        $title = $article["title"];
        return view("article/detail", compact("article", "title"));
    }
    public function admin_index()
    {
        $title = "Article Lists";
        $model = new ArticleModel();
        $article = $model->findAll();
        return view("article/admin_index", compact("article", "title"));
    }
    public function add()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        "title" => "required",
        "content" => "required",
        "category" => "required",
    ]);

    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        $article = new ArticleModel();
        $title = $this->request->getPost("title");
        $slug = url_title($title, '-', true);
        $exists = $article->where("slug", $slug)->countAllResults();
        if ($exists > 0) {
            $slug .= '-' . time();
        }

        $article->insert([
            "title" => $title,
            "content" => $this->request->getPost("content"),
            "slug" => $slug,
            "category" => $this->request->getPost("category"),
            "created_at" => date("Y-m-d H:i:s"),
        ]);

        return redirect()->to("admin/article");
    }

    $title = "Add Article";
    return view("article/form_add", compact("title"));
}
public function edit($id)
{
    $article = new ArticleModel();
    $validation = \Config\Services::validation();
    $validation->setRules([
        "title" => "required",
        "content" => "required",
        "category" => "required",
    ]);

    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        $title = $this->request->getPost("title");
        $slug = url_title($title, '-', true);
        $exists = $article->where("slug", $slug)->where("id !=", $id)->countAllResults();
        if ($exists > 0) {
            $slug .= '-' . time();
        }

        $article->update($id, [
            "title" => $title,
            "content" => $this->request->getPost("content"),
            "slug" => $slug,
            "category" => $this->request->getPost("category"),
        ]);

        return redirect()->to("admin/article");
    }

    $data = $article->where("id", $id)->first();
    $title = "Edit Article";
    return view("article/form_edit", compact("title", "data"));
}

    public function delete($id)
    {
        $article = new ArticleModel();
        $article->delete($id);
        return redirect("admin/article");
    }
}
