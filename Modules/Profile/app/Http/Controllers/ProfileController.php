<?php

namespace Modules\Profile\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Traits\ApiCrudTrait;
use Illuminate\Http\RedirectResponse;
use Modules\Profile\app\Http\Requests\ProfileRequest;
use Modules\Profile\app\Models\Profile;
use Modules\Profile\app\Resources\ProfileResource;

class ProfileController extends Controller
{
    use ApiCrudTrait;
    public function index()
    {
        return $this->indexCrud(Profile::class, ProfileResource::class, []);
    }
    public function show($id)
    {
        return $this->showCrud(
            Profile::class,
            ProfileResource::class,
            $id,
            ['user']
        );
    }


    public function store(ProfileRequest $request)
    {
        $createProfile = Profile::create([
            'bio' => $request->bio,
            'address' => $request->address,
            'user_id' => $request->user_id,
        ]);
        if ($createProfile) {
            return $this->storeOneRecord(ProfileResource::make($createProfile));
        }
        return $this->notFound();
    }
    public function update(ProfileRequest $request, $id)
    {
        $isProfileExist = Profile::find($id);
        if ($isProfileExist) {
            $request->has('user_id') ?
                $isProfileExist->update([
                    'bio' => $request->bio,
                    'address' => $request->address,
                    'user_id' => $request->user_id,
                ]) : $isProfileExist->update([
                    'bio' => $request->bio,
                    'address' => $request->address,
                ]);
            return $this->updateOneRecord(ProfileResource::make($isProfileExist));
        }
        return $this->notFound();
    }
    public function delete($id)
    {
        return $this->deleteCrudWithoutFile(Profile::class, $id);
    }
}
