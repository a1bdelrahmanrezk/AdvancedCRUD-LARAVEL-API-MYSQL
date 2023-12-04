<?php
namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function showAll($data){
        $responseData = $data->items();
        $info = [
            'total'=>$data->total(),
            'count'=>$data->count(),
            'per_page'=>$data->perpage(),
            'current_page'=>$data->currentPage(),
            // 'total_pages'=>$data->lastPage(),
            'from'=>$data->firstItem(),
            'to'=>$data->lastPage(),
        ];
        $links = [
            'prev_page_url'=>$data->previousPageUrl(),
            'next_page_url'=>$data->nextPageUrl(),
            'first_page_url'=>$data->url(1),
            'last_page_url'=>$data->url($data->lastPage()),
        ];
        $response = [
            'data'=>$responseData,
            'meta'=>[
                'pagination'=>$info,
                'links'=>$links,
            ],
            'type'=>'success',
            'status'=>true,
            'statusCode'=>Response::HTTP_OK,
            'message'=>'Data Fetched Successfully',
        ];
        return response()->json($response,Response::HTTP_OK);
    }
    public function showOneRecord($data){
        $response = [
            'data'=>$data,
            'type'=>'success',
            'status'=>true,
            'statusCode'=>Response::HTTP_OK,
            'message'=>'Data Fetched Successfully',
        ];
        return response()->json($response,Response::HTTP_OK);
    }
    public function notFound(){
        $response = [
            'data'=>null,
            'type'=>'error',
            'status'=>false,
            'statusCode'=>Response::HTTP_NOT_FOUND,
            'message'=>'Data Not Found',
        ];
        return response()->json($response,Response::HTTP_NOT_FOUND);
    }
    public function storeOneRecord($data){
        $response = [
            'data'=>$data,
            'type'=>'success',
            'status'=>true,
            'statusCode'=>Response::HTTP_CREATED,
            'message'=>'Data Created Successfully',
        ];
        return response()->json($response,Response::HTTP_CREATED);
    }
    public function updateOneRecord($data){
        $response = [
            'data'=>$data,
            'type'=>'success',
            'status'=>true,
            'statusCode'=>Response::HTTP_OK,
            'message'=>'Data Updated Successfully',
        ];
        return response()->json($response,Response::HTTP_OK);
    }
    public function deleteOneRecord(){
        $response = [
            'data'=>null,
            'type'=>'success',
            'status'=>true,
            'statusCode'=>Response::HTTP_OK,
            'message'=>'Data Deleted Successfully',
        ];
        return response()->json($response,Response::HTTP_OK);
    }
    public function validationFailureErrors($errors)
    {
        $formattedErrors = [];
        foreach ($errors->toArray() as $field => $messages) {
            $formattedErrors[$field] = implode(' ', $messages);
        }
        $response = [
            'errors_report' => $formattedErrors,
            'type' => 'error',
            'status'=>false,
            'statusCode' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => 'Validation Errors',
        ];
        return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
