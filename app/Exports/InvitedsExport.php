<?php

namespace App\Exports;

use App\Models\Invited;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvitedsExport implements  withEvents, FromQuery, Responsable, WithHeadings, WithStyles, WithMapping,ShouldAutoSize
{
    use Exportable;

    private $fileName = 'inviteds.xlsx';

    private $writerType = Excel::XLSX;

    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array{
        return[
            'المعرف',
            'تاريخ الإرسال',
            'الاسم',
            'البريد الإلكتروني',
            'رقم الجوال',
            'المنطقة',
            'الهوية الوطنية',
            'العمر',
            'العمل',
            'الفعالية',
            'نوع الدعوة',
            'هل حضر الفعالية',

        ];
    }

    public function map($inviteds): array
    {
        if($inviteds->invitation_type==1)
    {$invi='تسجيل';
    }else
            $invi='دعوة';
        if($inviteds->isPresence==1)
        {$invi1='نعم';
        }else
            $invi1='لا';

        return [
            $inviteds->id,
            $inviteds->created_at,
            $inviteds->name,
            $inviteds->email,
            $inviteds->mobile,
            $inviteds->area,

            $inviteds->id_number,

            $inviteds->age,
            $inviteds->work,

            $inviteds->day->name,
           $invi,
            $invi1

        ];
    }

    public function __construct( $invitation_type,$isPresence,$day_id)
    {
        $this->isPresence = $isPresence;
        $this->invitation_type = $invitation_type;
        $this->day_id = $day_id;
    }

    public function query()
    {
        $inviteds = Invited::query()
            ->select("*");


        if(!is_null($this->isPresence)) $inviteds = $inviteds->where('isPresence',$this->isPresence);

        if(!is_null($this->invitation_type)) $inviteds = $inviteds->where('invitation_type',$this->invitation_type);
        if(!is_null($this->day_id)) $inviteds = $inviteds->where('day_id',$this->day_id);

        return $inviteds;
    }
    public function registerEvents(): array
    {
        return [AfterSheet::class =>function(AfterSheet $event){
            $event->sheet->getDelegate()->setRightToLeft(true);
        }];    }


}
