<?php


namespace App\Http\Controllers;


use App\Services\PagarmeService;
use Illuminate\Http\Request;

/**
 * Class PagarmeController
 * @package App\Http\Controllers
 */
class PagarmeController extends Controller
{

    /**
     * @param Request $request
     * @return array|string
     */
    public function createPayment(Request $request){
        $pagarmeService = new PagarmeService();
        return $pagarmeService->createPayment($request);
    }

}
