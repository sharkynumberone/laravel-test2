<?php

namespace App\Http\Controllers;


/**
 * Class SwaggerController
 * @package App\Http\Controllers
 */
class SwaggerController extends Controller
{
    /**
     * Get swagger file content
     */
    public function file()
    {
        return file_get_contents(base_path('/docs/swagger.yml'));
    }

    /**
     * Render view with docs
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function docsForm()
    {
        return view('docs_form');
    }
}
