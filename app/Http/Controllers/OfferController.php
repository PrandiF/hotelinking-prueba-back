<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OfferController extends Controller
{
    


    /**
     * Obtener una lista de ofertas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $offers = Offer::all(); 

        return response()->json($offers);
    }

    /**
     * Crear una nueva oferta.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'valid_until' => 'required|date',
        ]);

        $offer = Offer::create([
            'title' => $request->title,
            'description' => $request->description,
            'valid_until' => $request->valid_until,
        ]);

        return response()->json([
            'message' => 'Offer created successfully.',
            'offer' => $offer,
        ], 201);
    }

    /**
     * Actualizar el estado de una oferta a "deshabilitado".
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $offer = Offer::findOrFail($id);

        $offer->status = $request->status;
        $offer->save();

        return response()->json([
            'message' => 'Offer status updated successfully.',
            'offer' => $offer,
        ]);
    }
}
