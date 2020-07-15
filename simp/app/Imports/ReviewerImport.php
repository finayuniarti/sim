<?php

namespace App\Imports;

use App\Reviewer;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReviewerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Reviewer([
            'name' => $row['nama_dosen'],
            'password' => Hash::make($row['nidn']),
            'nidn'=>$row['nidn'],
            'bidang_penelitian'=>$row['bidang_penelitian'],
            'email'=>$row['email']

        ]);
    }
}
