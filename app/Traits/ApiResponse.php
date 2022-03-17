<?php

namespace App\Traits;

trait ApiResponse {

    public function FailedResponse($message = 'Something went wrong :(', $status = 400) {
        return response()->json(['message' => $message], $status);
    }

    public function CreateFailedResponse() {
        return $this->FailedResponse('Failed to store data');
    }

    public function UnauthorizedResponse() {
        return $this->FailedResponse('You have no permission to do this', 403);
    }

    public function NotFoundResponse() {
        return $this->FailedResponse('Data not found', 404);
    }

    public function FailedDataExistResponse(){
        return $this->FailedResponse('Data already exists', 409);
    }

    public function SuccessResponse($data, $message = 'Success') {
        return response()->json(['data' => $data, 'message' => $message]);
    }

    public function SuccessWithoutDataResponse($message = 'Success') {
        return response()->json(['message' => $message]);
    }

    public function CreateSuccessResponse($message = 'Data successfully stored') {
        return $this->SuccessWithoutDataResponse($message);
    }

    public function EditSuccessResponse($message = 'Data successfully edited') {
        return $this->SuccessWithoutDataResponse($message);
    }

    public function FetchSuccessResponse($data) {
        return response()->json($data);
    }

    public function DeleteSuccessResponse() {
        return $this->SuccessWithoutDataResponse('Data successfully deleted');
    }

    public function ViewResponse($route) {
        return $this->SuccessResponse(['url' => route($route)]);
    }
}