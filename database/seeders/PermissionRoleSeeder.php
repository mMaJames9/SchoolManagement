<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'eleve_create']);
        Permission::create(['name' => 'eleve_edit']);
        Permission::create(['name' => 'eleve_show']);
        Permission::create(['name' => 'eleve_delete']);
        Permission::create(['name' => 'eleve_access']);

        Permission::create(['name' => 'enseignant_create']);
        Permission::create(['name' => 'enseignant_edit']);
        Permission::create(['name' => 'enseignant_show']);
        Permission::create(['name' => 'enseignant_delete']);
        Permission::create(['name' => 'enseignant_access']);

        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_edit']);
        Permission::create(['name' => 'user_show']);
        Permission::create(['name' => 'user_delete']);
        Permission::create(['name' => 'user_access']);

        Permission::create(['name' => 'famille_create']);
        Permission::create(['name' => 'famille_edit']);
        Permission::create(['name' => 'famille_show']);
        Permission::create(['name' => 'famille_delete']);
        Permission::create(['name' => 'famille_access']);

        Permission::create(['name' => 'bulletin_create']);
        Permission::create(['name' => 'bulletin_edit']);
        Permission::create(['name' => 'bulletin_show']);
        Permission::create(['name' => 'bulletin_delete']);
        Permission::create(['name' => 'bulletin_access']);

        Permission::create(['name' => 'classe_create']);
        Permission::create(['name' => 'classe_edit']);
        Permission::create(['name' => 'classe_show']);
        Permission::create(['name' => 'classe_delete']);
        Permission::create(['name' => 'classe_access']);

        Permission::create(['name' => 'cycle_create']);
        Permission::create(['name' => 'cycle_edit']);
        Permission::create(['name' => 'cycle_show']);
        Permission::create(['name' => 'cycle_delete']);
        Permission::create(['name' => 'cycle_access']);

        Permission::create(['name' => 'diplome_create']);
        Permission::create(['name' => 'diplome_edit']);
        Permission::create(['name' => 'diplome_show']);
        Permission::create(['name' => 'diplome_delete']);
        Permission::create(['name' => 'diplome_access']);

        Permission::create(['name' => 'frais_create']);
        Permission::create(['name' => 'frais_edit']);
        Permission::create(['name' => 'frais_show']);
        Permission::create(['name' => 'frais_delete']);
        Permission::create(['name' => 'frais_access']);

        Permission::create(['name' => 'materiel_create']);
        Permission::create(['name' => 'materiel_edit']);
        Permission::create(['name' => 'materiel_show']);
        Permission::create(['name' => 'materiel_delete']);
        Permission::create(['name' => 'materiel_access']);

        Permission::create(['name' => 'paiement_create']);
        Permission::create(['name' => 'paiement_edit']);
        Permission::create(['name' => 'paiement_show']);
        Permission::create(['name' => 'paiement_delete']);
        Permission::create(['name' => 'paiement_access']);

        Permission::create(['name' => 'parcours_create']);
        Permission::create(['name' => 'parcours_edit']);
        Permission::create(['name' => 'parcours_show']);
        Permission::create(['name' => 'parcours_delete']);
        Permission::create(['name' => 'parcours_access']);

        Permission::create(['name' => 'salaire_create']);
        Permission::create(['name' => 'salaire_edit']);
        Permission::create(['name' => 'salaire_show']);
        Permission::create(['name' => 'salaire_delete']);
        Permission::create(['name' => 'salaire_access']);

        Permission::create(['name' => 'stock_create']);
        Permission::create(['name' => 'stock_edit']);
        Permission::create(['name' => 'stock_show']);
        Permission::create(['name' => 'stock_delete']);
        Permission::create(['name' => 'stock_access']);


        $role1 = Role::create(['name' => 'Econome']);
        $role1->givePermissionTo('materiel_create');
        $role1->givePermissionTo('materiel_edit');
        $role1->givePermissionTo('materiel_show');
        $role1->givePermissionTo('materiel_delete');
        $role1->givePermissionTo('materiel_access');

        $role1->givePermissionTo('stock_create');
        $role1->givePermissionTo('stock_edit');
        $role1->givePermissionTo('stock_show');
        $role1->givePermissionTo('stock_delete');
        $role1->givePermissionTo('stock_access');

        $role2 = Role::create(['name' => 'Directeur']);

        $role3 = Role::create(['name' => 'Secretaire']);

        $role4 = Role::create(['name' => 'Fondateur']);

        $role5 = Role::create(['name' => 'Enseignant d\'informatique']);
    }
}
