<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ClientImport implements ToModel, WithHeadingRow
{
    use importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $enrollment_date = '';
        if(array_key_exists('enrollment_date', $row)){
            $enrollment_date = \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['enrollment_date']));
        }
        return new Client([
            //
        "first_name" => explode(' ', $row['name'])[0] ?? '',
        "last_name" => explode(' ', $row['name'])[1] ?? '',
        "address_1" =>  explode(',', $row['address'])[0] ?? '',
        "city" => explode(',', $row['address'])[1] ?? '',
        "zip" => explode(',', $row['address'])[2] ?? '',
        "email_address" => $row['email'] ?? '',
        "primary_phone" => $row['telephone'] ?? '',
        "secondary_phone" => $row['telephone_2'] ?? '',
        "is_active" => 1 ?? '',
        "created_at" => \Carbon\Carbon::now() ?? '',
        "updated_at" => \Carbon\Carbon::now() ?? '',
        "deleted_at" => null,
        "case_worker" => '',
        "assigned_to" => $row['assigned_to'] ?? '14',
        "user_id" => null,
        "address_2" => $row['address_2'] ?? '',
        "sex" => $row['gender'][0] ?? '',
        "release_date" => $row['release_date'] ?? '',
        "status" => $row['status'] ?? '',
        "state" => $row['state'] ?? '',
        "full_name" => $row['name'] ?? '',
        "citizenship" => $row['citizenship'] ?? '',
        "form_of_id" => [],
        "ncdps_id" => $row['opus'] ?? '',
        "maritial_status" => $row['marital_status'] ?? '',
        "race" => $row['race'] ?? '',
        "ethnicity" => $row['ethnicity'] ?? '',
        "education" => $row['level_of_education'] ?? '',
        "dob" => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob'])) ?? '',
        // "supervisors_name" => $row[''] ?? '',
        // "supervisors_phone" => $row[''] ?? '',
        // "supervisors_email" => $row[''] ?? '',
        // "supervisors_end_date" => $row[''] ?? '',
        // "supervision_level" => $row[''] ?? '',
        // "sex_offender" => $row[''] ?? '',
        // "county_registered" => $row[''] ?? '',
        // "released_from" => $row[''] ?? '',
        // "under_supervision" => $row[''] ?? '',
        // "middle_name" => $row[''] ?? '',
        "enrollment_date" => $enrollment_date ?? '',
        "suffix" => explode(' ', $row['name'])[1] ?? '',
        "charge" => 'testing',
        // "risk_level" => $row[''] ?? '',
        "first_offence_age" => $row['age_at_first_offense'] ?? '',
        "number_of_priors" => $row['of_priors'] ?? '',
        ]);
    }
}
