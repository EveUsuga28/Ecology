<?php

namespace App\Exports;
use \App\Models\reciclaje_institucion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ReciclajesExport implements FromView,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.reciclaje', [
            'reciclaje_institucion' => reciclaje_institucion::join("institucions","institucions.id", "=", "periodos_reciclaje.id_institucion")
                ->select("institucions.nombre","periodos_reciclaje.*",
                    DB::raw("(select ifnull(sum(total_kilos_material_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                        ." and estado=1)"."as kilos"),
                    DB::raw("(select ifnull(sum(total_puntaje_material_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                        ." and estado=1)"."as totalPuntajeMaterial"),
                    DB::raw("(select ifnull(sum(total_cantidad_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                        ." and estado=1)"."as cantidad"),
                    DB::raw("(select ifnull(sum(total_puntaje_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                        ." and estado=1)"."as totalPuntajeProductos"),
                    DB::raw("(select ifnull(sum(total_puntaje_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                        ." and estado=1)"."as totalPuntajeProductos"),
                    DB::raw("(select ifnull(sum(total_puntaje_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                        ." and estado=1)"."as totalPuntaje")
                )->get()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('G1')->getFont()->setBold(true);
        $sheet->getStyle('H1')->getFont()->setBold(true);
        $sheet->getStyle('I1')->getFont()->setBold(true);
        $sheet->getStyle('J1')->getFont()->setBold(true);


    }

}
