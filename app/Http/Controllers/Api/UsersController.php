<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetUsersRequest;
use App\Modules\DataProviders\Transformation\Sorters\Sorter;
use App\Modules\DataProviders\Users\UserDataManager;
use Exception;
use Spatie\ArrayToXml\ArrayToXml;

class UsersController extends Controller
{
    /**
     * @var UserDataManager
     */
    protected UserDataManager $userDataManager;

    public function __construct(UserDataManager $userDataManager)
    {
        $this->userDataManager = $userDataManager;
    }

    /**
     * Display users in XML format
     * @param GetUsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(GetUsersRequest $request)
    {
        $request->validated($request->all());

        $result = $this->userDataManager
            ->retrieve($request->input('count', 10))
            ->sort('last_name', Sorter::ORDER_DESC)
            ->convert();

        return response($result)->header('Content-Type', 'text/xml');
    }
}
