<?php

use Illuminate\Database\Seeder;
use App\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier();
        $supplier->name = 'Supplier 100';
        $supplier->website = 'supplier100.com';
        $supplier->uf = 'SP';
        $supplier->email = 'contact@supplier100.com';
        $supplier->save();

        Supplier::create([
            'name' => 'Supplier 200',
            'website' => 'supplier200.com',
            'uf' => 'RS',
            'email' => 'contact@supplier200.com'
        ]);

        /*
        DB::table('suppliers')->insert([
            'name' => 'Supplier 300',
            'website' => 'supplier300.com',
            'uf' => 'SP',
            'email' => 'contact@supplier300.com'
        ]);*/
    }
}
