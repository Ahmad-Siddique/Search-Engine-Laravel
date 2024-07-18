<?php

namespace App\Exports;

use App\Models\UserList;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserListExport implements FromCollection
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function collection()
    {
        return UserList::where('user_id', $this->userId)->get([
            'CSI', 'Description', 'Specs', 'Currency', 'Price_Min', 'Price_Max'
        ]);
    }

    public function headings(): array
    {
        return [
            'CSI', 'Description', 'Specs', 'Currency', 'Price_Min', 'Price_Max'
        ];
    }
}
