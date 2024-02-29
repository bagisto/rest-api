<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Configuration;

use Webkul\Admin\Http\Requests\ConfigurationForm;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Core\Tree;
use Webkul\RestApi\Http\Controllers\V1\Admin\AdminController;

class ConfigurationController extends AdminController
{
    /**
     * Tree instance.
     *
     * @var \Webkul\Core\Tree
     */
    protected $configTree;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CoreConfigRepository $coreConfigRepository)
    {
        parent::__construct();

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
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationForm $request)
    {
        $this->coreConfigRepository->create($request->except(['_token', 'admin_locale']));

        return response([

            'message' => trans('rest-api::app.admin.configuration.update-success'),
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
