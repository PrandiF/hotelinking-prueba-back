<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::insert([
            [
                'title' => 'Descuento del 20%',
                'description' => 'Obtén un 20% de descuento en tu próxima compra.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => 'Descuento del 30%',
                'description' => 'Obtén un 30% de descuento en tu próxima compra.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => 'Descuento del 50%',
                'description' => 'Obtén un 50% de descuento en tu próxima compra.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => '2x1',
                'description' => 'Compra un producto y llévate otro gratis.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => 'Descuento del 15% en productos seleccionados',
                'description' => 'Aprovecha un 15% de descuento en productos seleccionados.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => 'Envío gratis en compras superiores a $10000',
                'description' => 'Recibe envío gratis en compras superiores a $10000.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => 'Descuento del 25% en la primera compra',
                'description' => 'Obtén un 25% de descuento en tu primera compra.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
            [
                'title' => '3x2',
                'description' => 'Levá 3 productos al precio de 2.',
                'valid_until' => now()->addDays(30),
                'status' => 'habilitado',
            ],
        ]);
    }
}
