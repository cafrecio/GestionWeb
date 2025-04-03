<?php
// app/Services/ClienteApiService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ClienteApiService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://sistemaisis.ar:8089/api/Cliente_VW'; // Endpoint completo
        $this->apiKey = 'Vwzsq/jVTWBfPKu29tzeiw==';
    }

    public function fetchClientes()
    {
        try {
            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey,
                'Accept' => 'application/json'
            ])
            ->withoutVerifying() // Ignorar verificación SSL (solo para desarrollo)
            ->timeout(120) // 2 minutos para grandes datasets
            ->get($this->baseUrl);

            if ($response->successful()) {
                $clientes = $response->json();
                
                // Filtrar solo clientes activos
                $clientesActivos = array_filter($clientes, function($cliente) {
                    return strtoupper($cliente['estadoCli'] ?? '') === 'ACTIVO';
                });

                return $clientesActivos;
            }

            Log::error('Error API: ' . $response->status() . ' - ' . $response->body());
            return [];

        } catch (\Exception $e) {
            Log::error('Excepción en fetchClientes: ' . $e->getMessage());
            return [];
        }
    }

    public function validarCUIT($cuit)
    {
        // Validación exacta del formato XX-XXXXXXXX-X
        $pattern = '/^(?!00|11)\d{2}-\d{8}-\d$/';
        return preg_match($pattern, $cuit) === 1;
    }
    public function getUrl(): string
    {
        return $this->baseUrl;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function formatVendedor($nombreVendedor): string
    {
        return match (strtoupper(trim($nombreVendedor))) {
            'DAVID DANGELO' => 'DD',
            'LAURA FERREIRA' => 'LF',
            default => $nombreVendedor
        };
    }
}
