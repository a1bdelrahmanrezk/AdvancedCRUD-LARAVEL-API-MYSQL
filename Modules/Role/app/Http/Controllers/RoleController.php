<?php

namespace Modules\Role\app\Http\Controllers;


use Modules\Role\app\Models\Role;
use App\Http\Controllers\Controller;
use App\Traits\ApiCrudTrait;
use Modules\Role\app\Http\Requests\RoleRequest;
use Modules\Role\app\Resources\RoleResource;

class RoleController extends Controller
{
    use ApiCrudTrait;
    public function index()
    {
        return $this->indexCrud(Role::class,RoleResource::class,[]);
    }

    public function show($id)
    {
        return $this->showCrud(
            Role::class,
            RoleResource::class,
            $id,
            ['users'])
            ;
    }
    public function store(RoleRequest $request)
    {
        $createRole = Role::create([
            'name'=>$request->name,
        ]);
        if ($createRole) {
            return $this->storeOneRecord(RoleResource::make($createRole));
        }
        return $this->notFound();
    }
    public function update(RoleRequest $request, $id)
    {
        $isRoleExist = Role::find($id);
        if($isRoleExist){
            $isRoleExist->update([
                'name'=>$request->name,
            ]);
            return $this->updateOneRecord(RoleResource::make($isRoleExist));
        }
        return $this->notFound();
    }
    public function delete($id)
    {
        return $this->deleteCrudWithoutFile(Role::class,$id);
    }
}
