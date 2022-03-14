<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    private $page = "admin.permission.";
    private $redirectTo = "admin.permission.index";

    public function index()
    {
        $permissions = Permission::all();
        $createMode = false;
        $updateMode = false;
        return view($this->page . "index", compact("permissions", "createMode", "updateMode"))->with("id");
    }

    public function create()
    {
        return view($this->page . "create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "unique:permissions,name"],
        ]);
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $input = $request->except("_token");
                $input['slug'] = getSlug($request->name);
                Permission::create($input);
                DB::commit();
                return response()->json(["msg" => "Permission created successfully", "redirectRoute" => route($this->redirectTo)]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["db_error" => $e->getMessage()]);
            }
        }

    }
}
