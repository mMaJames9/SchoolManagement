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

        Permission::create(['name' => 'bulletin_create']);
        Permission::create(['name' => 'bulletin_edit']);
        Permission::create(['name' => 'bulletin_show']);
        Permission::create(['name' => 'bulletin_print']);
        Permission::create(['name' => 'bulletin_delete']);
        Permission::create(['name' => 'bulletin_access']);

        Permission::create(['name' => 'classe_create']);
        Permission::create(['name' => 'classe_edit']);
        Permission::create(['name' => 'classe_show']);
        Permission::create(['name' => 'classe_delete']);
        Permission::create(['name' => 'classe_access']);

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

        Permission::create(['name' => 'famille_create']);
        Permission::create(['name' => 'famille_edit']);
        Permission::create(['name' => 'famille_show']);
        Permission::create(['name' => 'famille_delete']);
        Permission::create(['name' => 'famille_access']);

        Permission::create(['name' => 'materiel_create']);
        Permission::create(['name' => 'materiel_edit']);
        Permission::create(['name' => 'materiel_show']);
        Permission::create(['name' => 'materiel_delete']);
        Permission::create(['name' => 'materiel_access']);

        Permission::create(['name' => 'matiere_create']);
        Permission::create(['name' => 'matiere_edit']);
        Permission::create(['name' => 'matiere_show']);
        Permission::create(['name' => 'matiere_delete']);
        Permission::create(['name' => 'matiere_access']);

        Permission::create(['name' => 'paiement_create']);
        Permission::create(['name' => 'paiement_edit']);
        Permission::create(['name' => 'paiement_show']);
        Permission::create(['name' => 'paiement_delete']);
        Permission::create(['name' => 'paiement_access']);

        Permission::create(['name' => 'personnel_create']);
        Permission::create(['name' => 'personnel_edit']);
        Permission::create(['name' => 'personnel_show']);
        Permission::create(['name' => 'personnel_delete']);
        Permission::create(['name' => 'personnel_access']);

        Permission::create(['name' => 'salaire_create']);
        Permission::create(['name' => 'salaire_edit']);
        Permission::create(['name' => 'salaire_show']);
        Permission::create(['name' => 'salaire_print']);
        Permission::create(['name' => 'salaire_delete']);
        Permission::create(['name' => 'salaire_access']);

        Permission::create(['name' => 'stock_create']);
        Permission::create(['name' => 'stock_edit']);
        Permission::create(['name' => 'stock_show']);
        Permission::create(['name' => 'stock_delete']);
        Permission::create(['name' => 'stock_access']);

        Permission::create(['name' => 'transaction_create']);
        Permission::create(['name' => 'transaction_edit']);
        Permission::create(['name' => 'transaction_show']);
        Permission::create(['name' => 'transaction_delete']);
        Permission::create(['name' => 'transaction_access']);

        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_edit']);
        Permission::create(['name' => 'user_show']);
        Permission::create(['name' => 'user_delete']);
        Permission::create(['name' => 'user_access']);


        $role1 = Role::create(['name' => 'Directeur']);

        // $role1->givePermissionTo('user_create');
        // $role1->givePermissionTo('user_edit');
        // $role1->givePermissionTo('user_delete');
        $role1->givePermissionTo('user_show');
        $role1->givePermissionTo('user_access');

        $role1->givePermissionTo('personnel_create');
        $role1->givePermissionTo('personnel_edit');
        $role1->givePermissionTo('personnel_show');
        $role1->givePermissionTo('personnel_delete');
        $role1->givePermissionTo('personnel_access');

        $role1->givePermissionTo('enseignant_create');
        $role1->givePermissionTo('enseignant_edit');
        $role1->givePermissionTo('enseignant_show');
        $role1->givePermissionTo('enseignant_delete');
        $role1->givePermissionTo('enseignant_access');

        $role1->givePermissionTo('eleve_create');
        $role1->givePermissionTo('eleve_edit');
        $role1->givePermissionTo('eleve_show');
        $role1->givePermissionTo('eleve_delete');
        $role1->givePermissionTo('eleve_access');

        $role1->givePermissionTo('famille_create');
        $role1->givePermissionTo('famille_edit');
        $role1->givePermissionTo('famille_show');
        $role1->givePermissionTo('famille_delete');
        $role1->givePermissionTo('famille_access');

        $role1->givePermissionTo('classe_create');
        $role1->givePermissionTo('classe_edit');
        $role1->givePermissionTo('classe_show');
        $role1->givePermissionTo('classe_delete');
        $role1->givePermissionTo('classe_access');

        $role1->givePermissionTo('matiere_create');
        $role1->givePermissionTo('matiere_edit');
        $role1->givePermissionTo('matiere_show');
        $role1->givePermissionTo('matiere_delete');
        $role1->givePermissionTo('matiere_access');

        $role1->givePermissionTo('bulletin_create');
        $role1->givePermissionTo('bulletin_edit');
        $role1->givePermissionTo('bulletin_show');
        $role1->givePermissionTo('bulletin_delete');
        $role1->givePermissionTo('bulletin_access');





        $role2 = Role::create(['name' => 'Econome']);
        // $role2->givePermissionTo('personnel_create');
        // $role2->givePermissionTo('personnel_edit');
        // $role2->givePermissionTo('personnel_delete');
        $role2->givePermissionTo('personnel_show');
        $role2->givePermissionTo('personnel_access');

        // $role2->givePermissionTo('enseignant_create');
        // $role2->givePermissionTo('enseignant_edit');
        // $role2->givePermissionTo('enseignant_delete');
        $role2->givePermissionTo('enseignant_show');
        $role2->givePermissionTo('enseignant_access');

        $role2->givePermissionTo('salaire_create');
        $role2->givePermissionTo('salaire_edit');
        $role2->givePermissionTo('salaire_delete');
        $role2->givePermissionTo('salaire_show');
        $role2->givePermissionTo('salaire_access');

        $role2->givePermissionTo('paiement_create');
        $role2->givePermissionTo('paiement_edit');
        $role2->givePermissionTo('paiement_delete');
        $role2->givePermissionTo('paiement_show');
        $role2->givePermissionTo('paiement_access');

        $role2->givePermissionTo('materiel_create');
        $role2->givePermissionTo('materiel_edit');
        $role2->givePermissionTo('materiel_delete');
        $role2->givePermissionTo('materiel_show');
        $role2->givePermissionTo('materiel_access');

        $role2->givePermissionTo('stock_create');
        $role2->givePermissionTo('stock_edit');
        $role2->givePermissionTo('stock_delete');
        $role2->givePermissionTo('stock_show');
        $role2->givePermissionTo('stock_access');

        $role2->givePermissionTo('transaction_create');
        $role2->givePermissionTo('transaction_edit');
        $role2->givePermissionTo('transaction_delete');
        $role2->givePermissionTo('transaction_show');
        $role2->givePermissionTo('transaction_access');




        $role3 = Role::create(['name' => 'Secretaire']);
        // $role3->givePermissionTo('personnel_create');
        // $role3->givePermissionTo('personnel_edit');
        // $role3->givePermissionTo('personnel_delete');
        $role3->givePermissionTo('personnel_show');
        $role3->givePermissionTo('personnel_access');

        // $role3->givePermissionTo('enseignant_create');
        // $role3->givePermissionTo('enseignant_edit');
        // $role3->givePermissionTo('enseignant_delete');
        $role3->givePermissionTo('enseignant_show');
        $role3->givePermissionTo('enseignant_access');

        $role3->givePermissionTo('eleve_create');
        $role3->givePermissionTo('eleve_edit');
        // $role3->givePermissionTo('eleve_delete');
        $role3->givePermissionTo('eleve_show');
        $role3->givePermissionTo('eleve_access');

        $role3->givePermissionTo('famille_create');
        $role3->givePermissionTo('famille_edit');
        // $role3->givePermissionTo('famille_delete');
        $role3->givePermissionTo('famille_show');
        $role3->givePermissionTo('famille_access');

        // $role3->givePermissionTo('classe_create');
        // $role3->givePermissionTo('classe_edit');
        // // $role3->givePermissionTo('classe_delete');
        $role3->givePermissionTo('classe_show');
        $role3->givePermissionTo('classe_access');

        // $role3->givePermissionTo('matiere_create');
        // $role3->givePermissionTo('matiere_edit');
        // // $role3->givePermissionTo('matiere_delete');
        $role3->givePermissionTo('matiere_show');
        $role3->givePermissionTo('matiere_access');

        $role3->givePermissionTo('bulletin_create');
        $role3->givePermissionTo('bulletin_edit');
        $role3->givePermissionTo('bulletin_delete');
        $role3->givePermissionTo('bulletin_show');
        $role3->givePermissionTo('bulletin_access');




        $role4 = Role::create(['name' => 'Fondateur']);




        $role5 = Role::create(['name' => 'Enseignant d\'informatique']);
    }
}
