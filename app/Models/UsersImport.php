<?php

namespace App\Models;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @return null|User
     */
    public function model(array $row)
    {
        $teste = $row;

        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => $row[2],
        ]);
    }
}