<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::with(['user', 'payment'])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Khách hàng',
            'Email',
            'Tổng tiền',
            'Giảm giá',
            'Thành tiền',
            'Trạng thái thanh toán',
            'Ngày tạo',
        ];
    }

    /**
     * @param Order $order
     * @return array
     */
    public function map($order): array
    {
        return [
            $order->id,
            $order->user->name ?? 'N/A',
            $order->user->email ?? 'N/A',
            number_format($order->total, 0, ',', '.') . ' ₫',
            number_format($order->discount, 0, ',', '.') . ' ₫',
            number_format($order->total_amount, 0, ',', '.') . ' ₫',
            $order->payment->status ?? 'N/A',
            $order->created_at->format('d/m/Y H:i'),
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            // Style the first row as bold
            1 => ['font' => ['bold' => true]],
        ];
    }
}
