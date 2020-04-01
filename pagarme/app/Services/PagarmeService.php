<?php


namespace App\Services;


use App\Services\Filters\PagarmeFilter;
use Illuminate\Http\Request;

/**
 * Class PagarmeService
 * @package App\Services
 */
class PagarmeService
{

    /**
     * @param Request $request
     * @return array|string
     */
    public function createPayment(Request $request){
        $data = (new PagarmeFilter())->dataFilterJson($request->post('data'));
        return $data;
    }

}
