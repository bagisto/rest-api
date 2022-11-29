<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Configuration;

use Webkul\Admin\Http\Requests\ConfigurationForm;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Core\Tree;
use Webkul\RestApi\Http\Controllers\V1\Admin\AdminController;

class ConfigurationController extends AdminController
{
    /**
     * Core config repository instance.
     *
     * @var \Webkul\Core\Repositories\CoreConfigRepository
     */
    protected $coreConfigRepository;

    /**
     * Tree instance.
     *
     * @var \Webkul\Core\Tree
     */
    protected $configTree;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\CoreConfigRepository  $coreConfigRepository
     * @return void
     */
    public function __construct(CoreConfigRepository $coreConfigRepository)
    {
        parent::__construct();
        
        $this->coreConfigRepository = $coreConfigRepository;

        $this->prepareConfigTree();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => $this->configTree,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Webkul\Admin\Http\Requests\ConfigurationForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationForm $request)
    {
        $this->coreConfigRepository->create($request->except(['_token', 'admin_locale']));

        return response([
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Configuration']),
        ]);
    }

    /**
     * Prepares config tree.
     *
     * @return void
     */
    private function prepareConfigTree()
    {
        $tree = Tree::create();

        foreach (config('core') as $item) {
            $tree->add($item);
        }

        $tree->items = core()->sortItems($tree->items);

        $this->configTree = $tree;
    }
}
