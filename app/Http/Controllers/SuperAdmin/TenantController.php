<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function store(Request $request)
    {
        $tenant = Tenant::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'domain' => $request->domain,
        ]);
    
        $tenant->createDatabase();
    
        $tenant->runMigrations();
    
        return redirect()->back()->with('success', 'Tenant created.');
    }
}
