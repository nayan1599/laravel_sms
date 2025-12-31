<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
  
    StudentApiController,
  
};

/*
|--------------------------------------------------------------------------
| API Versioning
|--------------------------------------------------------------------------
| All APIs are prefixed with /api/v1
| This allows future versions (v2, v3) without breaking clients
*/

Route::prefix('v1')->group(function () {

    /*
    |------------------------------------------------------------------
    | Authentication APIs
    |------------------------------------------------------------------
    */

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    /*
    |------------------------------------------------------------------
    | Public APIs (No Auth Required)
    |------------------------------------------------------------------
    */

    Route::get('/notices', [NoticeApiController::class, 'index']);
    Route::get('/notices/{id}', [NoticeApiController::class, 'show']);

    /*
    |------------------------------------------------------------------
    | Protected APIs (Auth Required)
    |------------------------------------------------------------------
    */

    Route::middleware('auth:sanctum')->group(function () {

        // Auth user info
        Route::get('/me', function (Request $request) {
            return response()->json($request->user());
        });

        /*
        |--------------------------------------------------------------
        | Academic APIs
        |--------------------------------------------------------------
        */

        Route::apiResources([
            'students'   => StudentApiController::class,
            'teachers'   => TeacherApiController::class,
            'classes'    => ClassApiController::class,
            'sections'   => SectionApiController::class,
            'subjects'   => SubjectApiController::class,
            'fees'       => FeeApiController::class,
            'exams'      => ExamApiController::class,
            'marks'      => MarkApiController::class,
            'attendance' => AttendanceApiController::class,
        ]);

        /*
        |--------------------------------------------------------------
        | Custom / Report APIs
        |--------------------------------------------------------------
        */

        Route::prefix('attendance')->group(function () {
            Route::get('/class/{class_id}', [AttendanceApiController::class, 'studentsByClass']);
            Route::get('/report', [AttendanceApiController::class, 'report']);
        });

    });
});

/*
|--------------------------------------------------------------------------
| API Fallback (Invalid Endpoint)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->json([
        'status'  => false,
        'message' => 'API endpoint not found'
    ], 404);
});
