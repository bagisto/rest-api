<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Configuration;

use Webkul\Admin\Http\Requests\ConfigurationForm;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Core\Tree;
use Webkul\RestApi\Http\Controllers\V1\Admin\AdminController;

class ConfigurationController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CoreConfigRepository $coreConfigRepository) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => config('core'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationForm $request)
    {
        $this->coreConfigRepository->create($request->except(['_token', 'admin_locale']));

        return response([
            'message' => trans('rest-api::app.admin.configuration.update-success'),
        ]);
    }
}
