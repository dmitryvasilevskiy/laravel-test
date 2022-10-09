<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class TestCommand extends Command
{
    protected $signature = 'test';

    protected $description = 'Command description';

    public function handle()
    {
        $user = User::query()->first();
        //$permission = Permission::query()->where('name', 'user.create')->first();
        dd($user->hasRole('manager'));
        dd($user->roles->where(fn($r) => $r->hasPermissionTo('user.create'))->count());
        return Command::SUCCESS;
    }
}
