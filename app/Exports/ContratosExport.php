<?php

namespace App\Exports;
use App\Models\Contrato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContratosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No Requisición',
            'Tipo de contrato',
            'Descripcion',
            'Vigencia del contrato',
            'Administrador',
            'Proveedor',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $contratos = Contrato::with(['Requisiciones', 'TipoContratos', 'Proveedor'])
            ->get();

        // Mapea los contratos y accede a las relaciones como propiedades
        return $contratos->map(function ($contrato) {
            return [
                'No Requisición' => $contrato->Requisiciones->no_requisicion,
                'Tipo de contrato' => $contrato->TipoContratos->nombre_tipo_contrato,
                'Descripcion' => $contrato->descripcion_contrato,
                'Vigencia del contrato' => $contrato->vigencia_contrato,
                'Administrador' => $contrato->empleado_num,
                'Proveedor' => $contrato->Proveedor->nombre,
            ];
        });
    }

    /**
     * @param Worksheet $sheet
     *
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            'A1:F1' => [
                'font' => [
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '008000'],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
