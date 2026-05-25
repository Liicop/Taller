<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehiculo;
use App\Models\Cita;
use App\Models\Factura;
use App\Models\Repuesto;
use App\Models\DetalleFactura;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([AdminSeeder::class]);

       User::factory()->count(20)->create();

       $usuarios = User::where('super_user', false)->get();

       foreach(range(1,40) as $i){

        Vehiculo::factory()->create([
            'user_id' => $usuarios->random()->id,
        ]);
       }

       $vehiculos = Vehiculo::all();
       
       foreach(range(1,60) as $i)
        {
            Cita::factory()->create([
                'vehiculo_id' => $vehiculos->random()->id
            ]);
        }

        Repuesto::factory()->count(40)->create();

        $citas = Cita::where('agendada',false)->get();

        foreach($citas as $cita)
        {
            Factura::create([
                'cita_id' => $cita->id,
                'total' => 0
            ]);
        }   

        $repuestos = Repuesto::all();

foreach (Factura::all() as $factura)
{
    $cantidadRepuestos = rand(1, 4);

    $seleccionados = $repuestos->random($cantidadRepuestos);

    foreach ($seleccionados as $repuesto)
    {
        if ($repuesto->cantidad <= 0) {
            continue;
        }

        $cantidad = rand(
            1,
            min(3, $repuesto->cantidad)
        );

        $subtotal =
            $cantidad *
            $repuesto->precio;

        DetalleFactura::create([
            'factura_id' => $factura->id,
            'repuesto_id' => $repuesto->id,
            'cantidad' => $cantidad,
            'precio_unitario' => $repuesto->precio,
            'subtotal' => $subtotal
        ]);

        $repuesto->decrement(
            'cantidad',
            $cantidad
        );
    }

    $factura->update([
        'total' => $factura
            ->detalles()
            ->sum('subtotal')
    ]);
}
    }
}
