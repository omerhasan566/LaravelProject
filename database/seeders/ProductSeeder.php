<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'NeuralLink X1 - Quantum Edition',
                'description' => 'Advanced neural interface with military-grade post-quantum encryption protocols.',
                'price' => 2499.99,
                'stock' => 15,
            ],
            [
                'name' => 'CyberShield Hardware Firewall v4',
                'description' => 'Next-gen hardware enterprise firewall featuring real-time AI threat mitigation.',
                'price' => 1850.00,
                'stock' => 8,
            ],
            [
                'name' => 'BioSecure Biometric Access Hub',
                'description' => 'Multi-factor biometric authentication gate utilizing zero-knowledge proof (ZKP) models.',
                'price' => 920.50,
                'stock' => 22,
            ],
            [
                'name' => 'BudgetAI Enterprise Engine',
                'description' => 'Automated financial predictive analysis tool for corporate asset and budget auditing.',
                'price' => 1450.00,
                'stock' => 50,
            ],
            [
                'name' => 'ZeroTrust Network Access Router',
                'description' => 'Secure edge router forcing strict identity verification for every single network micro-segment.',
                'price' => 670.00,
                'stock' => 12,
            ],
            [
                'name' => 'CryptoVault Cold Storage HSM',
                'description' => 'Hardware Security Module designed for ultra-secure cryptographic key management.',
                'price' => 3100.00,
                'stock' => 5,
            ],
            [
                'name' => 'ThreatHunter AI SIEM Platform',
                'description' => 'Cloud-native security information and event management driven by autonomous AI agents.',
                'price' => 4200.00,
                'stock' => 30,
            ],
            [
                'name' => 'BlackBox Penetration Testing Rig',
                'description' => 'Portable automated hardware rig for continuous network vulnerability scanning and mapping.',
                'price' => 1250.75,
                'stock' => 9,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['name' => $product['name']], $product);
        }
    }
}