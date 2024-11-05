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
use App\Models\Webinar;

class OrderController extends Controller
{

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_API_KEY'));
        // dd(env('XENDIT_API_KEY'));  
        // dd(env('XENDIT_CALLBACK_TOKEN'));
    }

    public function index()
    {
        // dd(env('XENDIT_CALLBACK_TOKEN'));

        $data = OrderDetails::all();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Data retrieved successfully',
            'data' => $data,
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/invoice",
     *     summary="Create an invoice",
     *     tags={"Order"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="course_id", type="integer", example=1),
     *             @OA\Property(property="tax", type="number", format="float", example=0.11),
     *             @OA\Property(property="service_charge", type="number", format="float", example=10000),
     *             @OA\Property(property="invoice_url", type="string", example="http://example.com/invoice"),
     *             @OA\Property(property="status", type="string", example="pending")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Invoice created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Invoice created successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="external_id", type="string", example="DGID-123456789"),
     *                 @OA\Property(property="price", type="number", format="float", example=100000),
     *                 @OA\Property(property="discount", type="number", format="float", example=5000),
     *                 @OA\Property(property="tax", type="number", format="float", example=11000),
     *                 @OA\Property(property="service_charge", type="number", format="float", example=10000),
     *                 @OA\Property(property="total_price", type="number", format="float", example=116000),
     *                 @OA\Property(property="invoice_url", type="string", example="http://example.com/invoice"),
     *                 @OA\Property(property="status", type="string", example="pending"),
     *                 @OA\Property(property="user_id", type="integer", example=1),
     *                 @OA\Property(property="course_id", type="integer", example=1),
     *                 @OA\Property(property="no_transaction", type="string", example="DGT-123456789")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User or Course not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="User not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to create invoice",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=500),
     *             @OA\Property(property="message", type="string", example="Failed to create invoice"),
     *             @OA\Property(property="error", type="string", example="Error message")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input data. Please check your request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Invalid input data. Please check your request")
     *         )
     *     )
     * )
     */
    public function invoice(Request $request)
    {
        try {

            $user = User::find($request->input('user_id'));
            $course = Course::find($request->input('course_id'));
            if (!$user) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'User not found',
                ], Response::HTTP_NOT_FOUND);
            }
            if (!$course) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Course not found',
                ], Response::HTTP_NOT_FOUND);
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

            $createInvoice = new CreateInvoiceRequest([
                'external_id' => $external_id,
                'payer_email' => User::find($request->input('user_id'))->email,
                'amount' => $order->total_price,
                'invoice_duration' => 172800,
            ]);

            $apiInstance = new InvoiceApi();
            $generateInvoice = $apiInstance->createInvoice($createInvoice);
            $order->invoice_url = $generateInvoice['invoice_url'];

            $order->status = $request->input('status', 'pending');
            $order->user_id = $request->input('user_id');
            $order->course_id = $request->input('course_id');
            $order->no_transaction = $no_transaction;

            $item = new InvoiceItem([
                'price' => $order->price
            ]);


            if ($order->status === 'pending') {
                Course::find($request->input('course_id'))->decrement('subscriber');
            }

            $order->save();

            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Invoice created successfully',
                'data' => $order,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to create invoice',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function handleCallback(Request $request)
    {
        $getToken = $request->headers->get('x-callback-token');
        $callbackToken = env('XENDIT_CALLBACK_TOKEN');

        // return response()->json([
        //     'status' => Response::HTTP_OK,
        //     'message' => 'Callback handled successfully',
        //     'data' => $request->all(),
        // ]);

        try {
            $order = OrderDetails::where('external_id', $request->external_id)->first();

            if (!$callbackToken) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Callback token not found',
                ], Response::HTTP_NOT_FOUND);
            }

            if ($getToken !== $callbackToken) {
                return response()->json([
                    'status' => Response::HTTP_UNAUTHORIZED,
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

            return response()->json([
                'message' => 'Callback handled successfully',
                'status' => Response::HTTP_OK,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to handle callback',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // TODO : Order Webinar redirect to whatsapp

    public function JoinWebinar(Request $request, $webinar_id)
    {
        $user = User::find($request->input('user_id')); // hard code user_id        
        $webinar = Webinar::find($webinar_id);
        if (!$user) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        }

        if (!$webinar) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Webinar not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $no_transaction = 'DGT-' . strtoupper(uniqid());
        $external_id = 'DGID-' . strtoupper(uniqid());

        $order = new OrderDetails();
        $order->external_id = $external_id;
        $order->no_transaction = $no_transaction;
        $order->user_id = $user->id;
        $order->status = 'webinar';
        $order->webinar_id = $webinar_id;
        $order->save();

        $message = "Halo, " . $user->name . "!\n";
        $message .= "Terima kasih telah melakukan pembayaran webinar " . $webinar->title . ".\n";
        $message .= "Silahkan klik link berikut untuk mengikuti webinar: " . $webinar->link . "\n";
        $message .= "Jika ada pertanyaan, silahkan hubungi kami melalui email: " . env('MAIL_FROM_ADDRESS') . "\n";
        $message .= "Terima kasih.";

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Redirect to whatsapp',
            'data' => $message,
        ]);
    }
}
