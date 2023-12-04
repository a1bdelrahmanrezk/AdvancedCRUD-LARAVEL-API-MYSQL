<?php
namespace App\Traits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

// use Modules\User\app\Resources\UserResource;
trait ApiCrudTrait{
    use ResponseTrait;
    public function indexCrud($modelName,$modelResource,array $relations = []){
        if ($modelName::where('id', '>', '0')->first()) {
            $data = $modelName::with($relations)->paginate(20);
            return $this->showAll($modelResource::collection($data));
        }
        return $this->notFound();
    }
    public function showCrud($modelName,$modelResource,$id,array $relations = []){
        $data = $modelName::with($relations)->find($id);
        if ($data) {
            return $this->showOneRecord($modelResource::make($data));
        }
        return $this->notFound();
    }
    public function deleteCrudWithoutFile($modelName,$id){
        $isDataExist = $modelName::find($id);
        if($isDataExist){
            $isDataExist->delete();
            return $this->deleteOneRecord();
        }
        return $this->notFound();
    }
    public function deleteCrudWithFile($modelName,$id,$collectionName){
        $isDataExist = $modelName::find($id);
        if($isDataExist){
            $isDataExist->delete();
            $this->deleteImage($isDataExist,$collectionName);
            return $this->deleteOneRecord();
        }
        return $this->notFound();
    }
}