<?php

namespace App\Traits;

use App\Models\Utility;

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

    public function PaginationSuccess($data, $totalPage) {
        $settings = Utility::settings();
        $dateFormat = [
            'short' => [
                'year'  => 'numeric',
                'month' => 'short',
                'day'   => 'numeric'
            ],
            'long' => [
                'year'  => 'numeric',
                'month' => 'long',
                'day'   => 'numeric',
            ], 
            'numeric' => [
                'year'  => 'numeric',
                'month' => 'numeric',
                'day'   => 'numeric'
            ]
        ];
        if(in_array($settings['site_date_format'], array_keys($dateFormat))) {
            $format = $dateFormat[$settings['site_date_format']];
        } else {
            $format = $dateFormat['short'];
        }

        return $this->FetchSuccessResponse([
            'data'      => $data,
            'pages'     => $totalPage,
            'currency'  => $settings['site_currency'],
            'date'      => $format,
        ]);
    }
}