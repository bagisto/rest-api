<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Configuration;

use Illuminate\Support\Facades\Event;
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
        $this->coreConfigRepository = $coreConfigRepository;

        $this->prepareConfigTree();
    }

    /**
     * Prepares config tree.
     *
     * @return void
     */
    public function prepareConfigTree()
    {
        $tree = Tree::create();

        foreach (config('core') as $item) {
            $tree->add($item);
        }

        $tree->items = core()->sortItems($tree->items);

        $this->configTree = $tree;
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
        Event::dispatch('core.configuration.save.before');

        $this->coreConfigRepository->create($request->except(['_token', 'admin_locale']));

        Event::dispatch('core.configuration.save.after');

        return response([
            'message' => __('admin::app.configuration.save-message'),
        ]);
    }
}
