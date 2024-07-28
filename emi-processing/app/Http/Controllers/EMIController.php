<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LoanDetail;

class EMIController extends Controller
{
    public function showLoanDetails()
    {
        $loanDetails = LoanDetail::all();
        return view('loan_details', compact('loanDetails'));
    }

    public function processEMIData()
    {
        DB::statement('DROP TABLE IF EXISTS emi_details');
        $this->createEMITable();

        $loanDetails = LoanDetail::all();

        foreach ($loanDetails as $loan) {
            $this->insertEMIData($loan);
        }

        $emiDetails = DB::table('emi_details')->get();
        return view('emi', compact('emiDetails'))->render();
    }


    private function createEMITable()
    {
        $firstDate = LoanDetail::min('first_payment_date');
        $lastDate = LoanDetail::max('last_payment_date');

        $months = [];
        $currentDate = strtotime($firstDate);
        $endDate = strtotime($lastDate);

        while ($currentDate <= $endDate) {
            $months[] = date('Y_M', $currentDate);
            $currentDate = strtotime("+1 month", $currentDate);
        }

        $columns = implode(" decimal(10,2) DEFAULT 0.00, ", $months) . " decimal(10,2) DEFAULT 0.00";

        DB::statement("CREATE TABLE emi_details (
            clientid BIGINT UNSIGNED NOT NULL,
            $columns
        )");
    }

    private function insertEMIData($loan)
    {
        $emiAmount = $loan->loan_amount / $loan->num_of_payment;
        $firstPaymentDate = strtotime($loan->first_payment_date);
        $lastPaymentDate = strtotime($loan->last_payment_date);

        $months = [];
        $currentDate = $firstPaymentDate;

        while ($currentDate <= $lastPaymentDate) {
            $months[] = date('Y_M', $currentDate);
            $currentDate = strtotime("+1 month", $currentDate);
        }

        $data = ['clientid' => $loan->clientid];

        foreach ($months as $index => $month) {
            if ($index < $loan->num_of_payment - 1) {
                $data[$month] = $emiAmount;
            } else {
                $remainingAmount = $loan->loan_amount - ($emiAmount * ($loan->num_of_payment - 1));
                $data[$month] = $remainingAmount;
            }
        }

        DB::table('emi_details')->insert($data);
    }
}
