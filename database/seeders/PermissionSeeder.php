<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
    
        // $permissions = [
        //     'product.index',
        //     'product.create',
        //     'product.edit',
        //     'product.delete',
        //     'category.index',
        //     'category.create',
        //     'category.edit',
        //     'category.delete',
        //     'user.index',

            
        // ];
        // $role = Role::updateOrCreate(['name'=>'admin']);
        // foreach($permissions as $permission){
        //     Permission::updateOrCreate(['name'=> $permission]);
        // }
        // $permissions = Permission::all();
        // $role->syncPermissions($permissions);
        // $user = User::find(1);
        // $user->assignRole('admin');

        // $userrole = Role::updateOrCreate(['name'=>'user']);
        // $userrole -> syncPermissions(['product.index','category.index']);
        // $customer = User::find(3);
        // $customer -> assignRole($userrole);

        $permissions = [
            'product.index',
            'product.create',
            'product.edit',
            'product.delete',
            'category.index',
            'category.create',
            'category.edit',
            'category.delete',
            'permission.index',
            'permission.create',
            'permission.edit',
            'permission.delete',
            'role.index',
            'role.create',
            'role.edit',
            'role.delete',
            'user.home',
            'user.index',
            'user.edit',
            'user.delete',
            'admin.pending-product'
            
        
        ];
        $adminrole = Role::updateOrCreate(['name'=>'admin']);

        foreach($permissions as $permission){
            Permission::updateOrCreate(['name'=>$permission]);
        }
        $permission = Permission::all();
        $adminrole->syncPermissions($permission);
        $admin = User::find(1);
        $admin->syncRoles('admin');

        // $userrole = Role::updateOrCreate(['name'=>'user']);
        // $userrole->syncPermissions(['user.home','category.index','product.index']);
        // $user = User::find(1);
        // $user->syncRoles('user');
        
    }
}
