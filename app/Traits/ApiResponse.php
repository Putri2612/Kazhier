<?php

namespace App\Traits;

use App\Models\Utility;

trait ApiResponse {

    protected function FailedResponse($message = 'Something went wrong :(', $status = 400) {
        return response()->json(['message' => $message], $status);
    }

    protected function CreateFailedResponse() {
        return $this->FailedResponse('Failed to store data');
    }

    protected function UnauthorizedResponse() {
        return $this->FailedResponse('You have no permission to do this', 403);
    }

    protected function NotFoundResponse() {
        return $this->FailedResponse('Data not found', 404);
    }

    protected function FailedDataExistResponse(){
        return $this->FailedResponse('Data already exists', 409);
    }

    protected function SuccessResponse($data, $message = 'Success') {
        return response()->json(['data' => $data, 'message' => $message]);
    }

    protected function SuccessWithoutDataResponse($message = 'Success') {
        return response()->json(['message' => $message]);
    }

    protected function CreateSuccessResponse($message = 'Data successfully stored') {
        return $this->SuccessWithoutDataResponse($message);
    }

    protected function EditSuccessResponse($message = 'Data successfully edited') {
        return $this->SuccessWithoutDataResponse($message);
    }

    protected function FetchSuccessResponse($data) {
        return response()->json($data);
    }

    protected function DeleteSuccessResponse() {
        return $this->SuccessWithoutDataResponse('Data successfully deleted');
    }

    protected function ViewResponse($route) {
        return $this->SuccessResponse(['url' => route($route)]);
    }

    protected function PaginationSuccess($data, $totalPage) {
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