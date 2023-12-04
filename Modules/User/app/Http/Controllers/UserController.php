<?php

namespace Modules\User\app\Http\Controllers;

use App\Traits\ApiCrudTrait;
use Illuminate\Http\Request;
use Modules\User\app\Models\User;
use App\Http\Controllers\Controller;
use App\Traits\StoreFileTrait;
use Modules\User\app\Resources\UserResource;
use Modules\User\app\Http\Requests\UserRequest;

class UserController extends Controller
{
    use ApiCrudTrait, StoreFileTrait;
    public function index()
    {
        return $this->indexCrud(User::class,UserResource::class,[]);
    }
    public function show($id)
    {
        return $this->showCrud(
            User::class,
            UserResource::class,
            $id,
            ['profile','roles','posts','comments']
        );
    }
    public function store(UserRequest $request)
    {
        $createUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        // make queue steps
        //php artisan queue:table
        //php artisan migrate
        //php artisan make:job StoreFileJob
        //write inside handle & if there are vars write it in __construct()
        //to call it : [dispatch(new StoreFileJob())]
        //php artisan queue:work
        $request->hasFile('image') ?
            $this->storeImage($createUser, $request, 'user_images') :
            null;
        if ($createUser) {
            return $this->storeOneRecord(UserResource::make($createUser));
        }
        return $this->notFound();
    }
    public function update(UserRequest $request, $id)
    {
        $isUserExist = User::find($id);
        if($isUserExist){
            $isUserExist->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            $request->hasFile('image') ?
            $this->updateImage($isUserExist, $request, 'user_images') :
            null;
            return $this->updateOneRecord(UserResource::make($isUserExist));
        }
        return $this->notFound();
    }
    
    public function delete($id)
    {
        return $this->deleteCrudWithFile(User::class,$id,'user_images');
    }
}
