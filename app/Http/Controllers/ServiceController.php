<?php namespace App\Http\Controllers;
use App\Transaction;

class ServiceController extends Controller {


    public $restful = true;

    public function getAllTransaction() {
        try{
            $response = [];
            $statusCode = 200;
            $transactions = Transaction::all();
            foreach($transactions as $transaction){
                $response[] = [
                    'code' => $transaction->id,
                    'type' => $transaction->type,
                    'content' => $transaction->content
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }
    
    public function getTransaction($version) {
        try{
            $response = [];
            $statusCode = 200;
            $transactions = Transaction::where('id','>',$version)->get();
            foreach($transactions as $transaction){
                $response[] = [
                    'code' => $transaction->id,
                    'type' => $transaction->type,
                    'content' => $transaction->content
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

}