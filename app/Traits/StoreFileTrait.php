<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait StoreFileTrait{
    public function storeImage($modelName,$request,$collectionName){
        $modelName
        ->addMediaFromRequest('image')
        ->usingFileName($request->name.'_'.Str::random(10).'.'.$request->file('image')->extension())
        ->toMediaCollection($collectionName);
    }
    public function updateImage($modelName,$request,$collectionName){
        $modelName->clearMediaCollection($collectionName);
        // $modelName->media()->delete();
        $modelName
        ->addMediaFromRequest('image')
        ->usingFileName($request->name.'_'.Str::random(10).'.'.$request->file('image')->extension())
        ->toMediaCollection($collectionName);
    }
    public function deleteImage($modelName,$collectionName){
        // $modelName->media()->delete();
        $modelName->clearMediaCollection($collectionName);
    }
    public function storeFile($modelName,$request,$collectionName){
        $modelName
        ->addMediaFromRequest('file')
        ->usingFileName($request->title.'_'.Str::random(10).'.'.$request->file('file')->extension())
        ->toMediaCollection($collectionName);
    }
    public function updateFile($modelName,$request,$collectionName){
        $modelName->clearMediaCollection($collectionName);
        // $modelName->media()->delete();
        $modelName
        ->addMediaFromRequest('file')
        ->usingFileName($request->title.'_'.Str::random(10).'.'.$request->file('file')->extension())
        ->toMediaCollection($collectionName);
    }
    public function deleteFile($modelName,$collectionName){
        // $modelName->media()->delete();
        $modelName->clearMediaCollection($collectionName);
    }
}