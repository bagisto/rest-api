<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Configuration;

use Illuminate\Http\Response;
use Webkul\Admin\Http\Requests\ConfigurationForm;
use Webkul\Core\Repositories\CoreConfigRepository;
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
     */
    public function index(): Response
    {
        return response([
            'data' => config('core'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConfigurationForm $request): Response
    {
        $this->coreConfigRepository->create($request->except(['_token', 'admin_locale']));

        return response([
            'message' => trans('rest-api::app.admin.configuration.update-success'),
        ]);
    }
}
