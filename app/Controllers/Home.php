<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $context = array();

    public function index()
    {
        $productModel = new ProductModel();

        $this->context["title"] = "Toko Bunga";
        $this->context["products"] = $productModel->findAll();
        
        echo view("indexPage", $this->context);
    }

    public function admin() {
        $this->context["title"] = "Dashboard";

        echo view("admin/layout/header", $this->context);
        echo view("admin/layout/sidebar");
        echo view("admin/dashboard");
        echo view("admin/layout/footer");
    }
}
