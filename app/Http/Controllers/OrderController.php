<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Xendit\Configuration;
use App\Models\User;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\InvoiceItem;
use App\Models\Course;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_API_KEY'));
        // dd(env('XENDIT_API_KEY'));
    }

    public function index()
    {
        return response()->json([
            'message' => 'Welcome to the OrderController',
        ]);
    }

    public function invoice(Request $request)
    {
        try {
            $user = User::find($request->input('user_id'));
            $course = Course::find($request->input('course_id'));
            if (!$user) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found',
                ], 404);
            }
            if (!$course) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Course not found',
                ], 404);
            }

            $no_transaction = 'DGT-' . strtoupper(uniqid());
            $external_id = 'DGID-' . strtoupper(uniqid());
            $order = new OrderDetails();
            $order->external_id = $external_id;
            $order->price = Course::find($request->input('course_id'))->final_price;
            $order->discount = Course::find($request->input('course_id'))->discounted_price;
            $order->tax = $request->input('tax', 11 / 100);
            $order->service_charge = $request->input('service_charge', 10000);
            $order->total_price = $order->price + $order->tax + $order->service_charge;
            $order->invoice_url = $request->input('invoice_url');
            $order->status = $request->input('status', 'pending');
            $order->user_id = $request->input('user_id');
            $order->course_id = $request->input('course_id');
            $order->no_transaction = $no_transaction;

            $item = new InvoiceItem([
                'name' => 'Course',
                'quantity' => 1,
                'price' => $order->price,
            ]);

            $createInvoice = new CreateInvoiceRequest([
                'external_id' => $external_id,
                'payer_email' => $request->payer_email,
                'amount' => $order->total_price,
                'invoice_duration' => 172800,
                'items' => [$item],
            ]);

            $apiInstance = new InvoiceApi();
            $generateInvoice = $apiInstance->createInvoice($createInvoice);
            $order->invoice_url = $generateInvoice['invoice_url'];

            if ($order->status === 'pending') {
                Course::find($request->input('course_id'))->decrement('subscriber');
            }

            $order->save();

            return response()->json([
                'message' => 'Invoice created successfully',
                'data' => $order,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create invoice',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        $getToken = $request->headers->get('x-callback-token');
        $callbackToken = env('XENDIT_CALLBACK_TOKEN');

        try {
            // return response()->json([
            //     'message' => 'Callback handled successfully',
            //     'token' => $getToken,
            //     // 'callback_token' => $callbackToken,
            // ], Response::HTTP_OK);
            $order = OrderDetails::where('external_id', $request->external_id)->first();

            if (!$callbackToken) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Callback token not found',
                ], Response::HTTP_NOT_FOUND);
            }

            if ($getToken !== $callbackToken) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ], Response::HTTP_UNAUTHORIZED);
            }

            if ($order) {
                if ($request->status === 'PAID') {
                    $order->status = 'paid';
                    Course::find($order->course_id)->increment('subscriber');
                    $order->save();
                } else if ($request->status === 'EXPIRED') {
                    $order->status = 'expired';
                    $order->save();
                } else if ($request->status === 'FAILED') {
                    $order->status = 'failed';
                    $order->save();
                }
            }

            // $course = Course::find($order->course_id);
            // if ($order->status === 'paid') {
            //     $course->users()->attach($order->user_id);
            //     $course->increment('subscriber');
            // }

            return response()->json([
                'message' => 'Callback handled successfully',
                'status' => Response::HTTP_OK,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to handle callback',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
