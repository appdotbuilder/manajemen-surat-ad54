<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IncomingLetter;
use App\Models\OutgoingLetter;
use App\Models\Disposition;
use App\Models\Employee;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $stats = [
            'incoming_letters' => IncomingLetter::count(),
            'outgoing_letters' => OutgoingLetter::count(),
            'dispositions' => Disposition::count(),
            'employees' => Employee::count(),
        ];

        return Inertia::render('dashboard', [
            'stats' => $stats
        ]);
    }
}