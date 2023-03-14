<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Handle exceptions
         * User can be redirected either
         *      1. back to the previous page (set 'back' to true, 'path' and 'buttonText' attributes does not have to be set)
         *      2. to another page (set 'back' to false, 'path' and 'buttonText' attributes have to be set)
         */
        // If user tries to upload file that is too large, show custom error page
        $this->renderable(function (PostTooLargeException $e, $request) {
            return response()->view('error.exception', [
                'errorMessage' => 'Subor, ktory ste sa pokusili nahrat je prilis velky!',
                'back' => true
            ], 500);
        });

        // If user enters invalid page, show custom error page
        $this->renderable(function (NotFoundHttpException  $e, $request) {
            return response()->view('error.exception', [
                'errorMessage' => 'Dana stranka sa nenasla!',
                'back' => false,
                'path' => '/',
                'buttonText' => 'Domov'
            ], 500);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
