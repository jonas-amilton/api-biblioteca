<?php
namespace App\Services;

use App\Models\Loan;

class LoanService
{
    public function idNotAvailable()
    {
        return Loan::select('id')
            ->where(
                'status',
                'pending'
            )->get();
    }
}
