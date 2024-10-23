<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PromoCodeController extends Controller
{
    /**
     * Crear un nuevo código promocional.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'offer_id' => 'required|exists:offers,id', 
        ]);

        $code = strtoupper(uniqid('PROMO_')); 

        $promoCode = PromoCode::create([
            'code' => $code,
            'offer_id' => $request->offer_id,
            'is_redeemed' => false,
        ]);

        return response()->json([
            'message' => 'Promo code created successfully.',
            'promo_code' => $promoCode,
        ], 201);
    }

    /**
     * Obtener todos los códigos promocionales.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $promoCodes = PromoCode::with('offer')->get(); 

        return response()->json($promoCodes);
    }

    /**
     * Canjear un código promocional.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function redeemPromoCode($id, Request $request)
    {
        $promoCode = PromoCode::find($id);
    
        if (!$promoCode) {
            return response()->json([
                'message' => 'Código promocional no encontrado.',
            ], 404);
        }
    
        if ($promoCode->code !== $request->input('code')) {
            return response()->json([
                'message' => 'El código promocional es incorrecto.',
            ], 400);
        }
        
        $promoCode->is_redeemed = true;
        $promoCode->save();
    
        return response()->json([
            'message' => 'Código promocional canjeado exitosamente.',
        ], 200);
    }
    
}

