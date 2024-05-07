<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $promotor = Role::create(['name' => 'promotor']);

        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.users']);
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.familias']);
        Permission::create(['name' => 'admin.familias.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.familias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.familias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.familias.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.categorias']);
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.subcategorias']);
        Permission::create(['name' => 'admin.subcategorias.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.subcategorias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.subcategorias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.subcategorias.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.productos']);
        Permission::create(['name' => 'admin.productos.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.productos.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.productos.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.productos.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.proveedors']);
        Permission::create(['name' => 'admin.proveedors.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.proveedors.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.proveedors.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.proveedors.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.nota_compras']);
        Permission::create(['name' => 'admin.nota_compras.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.nota_compras.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.nota_compras.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.nota_compras.destroy'])->syncRoles([$admin]);

        //Permission::create(['name' => 'admin.bitacora']);
        Permission::create(['name' => 'admin.bitacora.index'])->syncRoles([$admin]);
        
    }
}
