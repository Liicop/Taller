<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CitaController extends Controller
{
    public function index(){
        $citas = Cita::whereHas('vehiculo', function ($query){
            $query->where('user_id', Auth::id());
        })->with('vehiculo')->get();
        return view('citas.index', compact('citas'));
    }

    public function create(){
        $vehiculos = Auth::user()->vehiculos;

        return view('citas.create', compact('vehiculos'));
    }

    public function store(Request $request){

        $request->validate([

            // 1. SEGURIDAD: El vehículo debe existir Y pertenecer al usuario autenticado.
            //    Sin el ->where(), cualquier usuario podría agendar con un vehículo ajeno.
            'vehiculo_id' => [
                'required',
                Rule::exists('vehiculos', 'id')->where('user_id', Auth::id()),
            ],

            // 2. FECHA: Debe ser una fecha válida, no anterior a hoy, y no puede ser domingo.
            'fecha' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    // date('N') devuelve: 1=Lunes, 2=Martes... 6=Sábado, 7=Domingo
                    $diaSemana = date('N', strtotime($value));
                    if ($diaSemana == 7) {
                        $fail('No se atiende los domingos.');
                    }
                },
            ],

            // 3. HORA: Formato válido, dentro del horario de atención,
            //    sin duplicados y sin horas pasadas si la fecha es hoy.
            'hora' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {

                    // Determinar el horario de cierre según el día
                    $diaSemana = date('N', strtotime($request->fecha));
                    $horaCierre = ($diaSemana == 6) ? '14:00' : '17:00';

                    // Validar rango de horario de atención
                    if ($value < '10:00' || $value > $horaCierre) {
                        $dia = ($diaSemana == 6) ? 'sábados' : 'lunes a viernes';
                        $fail("El horario de atención $dia es de 10:00 a $horaCierre.");
                    }

                    // Si la fecha es hoy, la hora no puede ser una que ya pasó
                    if ($request->fecha === date('Y-m-d') && $value <= date('H:i')) {
                        $fail('La hora de la cita ya pasó. Selecciona una hora futura.');
                    }

                    // No puede haber otra cita en la misma fecha y hora
                    $duplicada = Cita::where('fecha', $request->fecha)
                        ->where('hora', $value)
                        ->exists();
                    if ($duplicada) {
                        $fail('Ya existe una cita agendada para esta fecha y hora.');
                    }
                },
            ],

            // 4. MOTIVO: Obligatorio, tipo string, máximo 255 caracteres.
            'motivo' => 'required|string|max:255',
        ]);

        Cita::create([
            'vehiculo_id' => $request->vehiculo_id,
            'fecha' => $request->fecha,
            'hora'  => $request->hora,
            'motivo' => $request->motivo,
            'agendada' => true,
        ]);

        return redirect()->route('citas.index');
    }

    public function edit(Cita $cita){

        if ($cita->vehiculo->user_id !== Auth::id()){
            abort(403);
        }

        $vehiculos = Auth::user()->vehiculos;
        return view('citas.edit', compact('vehiculos','cita'));
    }

    public function update(Request $request, Cita $cita){

        if ($cita->vehiculo->user_id !== Auth::id()){
            abort(403);
        }

        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|max:255'
        ]);


        $cita->update([
            'vehiculo_id' => $request->vehiculo_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
        ]);

        return redirect()->route('citas.index');
    }

    public function destroy(Cita $cita){

        if ($cita->vehiculo->user_id !== Auth::id()) {
            abort(403);
        }

        $cita->delete();

        return redirect()->route('citas.index');
    }
}
