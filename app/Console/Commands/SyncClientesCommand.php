<?php
// app/Console/Commands/SyncClientesCommand.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ClienteApiService;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class SyncClientesCommand extends Command
{
    // Configuración básica del comando
    protected $signature = 'sync:clientes';
    protected $description = 'Sincroniza clientes activos desde la API preservando datos locales';

    public function handle()
    {
        $this->line('🔌 Conectando a la API de ISIS...');
        
        try {
            $apiService = new ClienteApiService();
            $clientesApi = $apiService->fetchClientes();

            // Verificación básica de datos
            if(empty($clientesApi)) {
                throw new \Exception('No se recibieron datos de la API');
            }

            $this->info('✅ Datos recibidos: ' . count($clientesApi) . ' registros');
            
            // Desactivar logs para mejor performance
            DB::connection()->disableQueryLog();
            
            // Barra de progreso con estilo
            $bar = $this->output->createProgressBar(count($clientesApi));
            $bar->setBarCharacter('▓');
            $bar->setEmptyBarCharacter('░');
            $bar->setProgressCharacter('⚡');
            $bar->start();

            $contador = 0;
            foreach($clientesApi as $clienteData) {
                // Validación CUIT automática
                if(!$this->validarDatosBasicos($clienteData)) continue;

                // Actualización inteligente (no toca 'entregamos' si ya existe)
                $this->actualizarCliente($clienteData);
                
                $contador++;
                $bar->advance();
            }

            $bar->finish();
            $this->newLine(2);
            $this->info("🎉 Sincronización completa: {$contador} clientes actualizados");
            $this->line("💡 Datos locales preservados: El campo 'entregamos' no se modificó");
            
        } catch (\Exception $e) {
            $this->newLine();
            $this->error('💥 Error grave: ' . $e->getMessage());
            $this->line('🚑 Ejecuta con -vvv para detalles técnicos');
        }
    }

    /**
     * Valida los datos mínimos requeridos
     */
    private function validarDatosBasicos($data): bool
    {
        // Validación CUIT básica
        if(!preg_match('/^\d{2}-\d{8}-\d$/', $data['cuitCli'] ?? '')) {
            $this->warn('⚠️  CUIT inválido: ' . ($data['cuitCli'] ?? 'NULL'));
            return false;
        }

        // Filtro de estado activo
        if(strtoupper($data['estadoCli'] ?? '') !== 'ACTIVO') {
            return false;
        }

        return true;
    }

    /**
     * Actualización optimizada para no tocar el campo 'entregamos'
     */
    private function actualizarCliente($clienteData): void
    {
        $datosActualizacion = [
            'cuitCli' => $clienteData['cuitCli'],
            'nombreVendedor' => (new ClienteApiService())->formatVendedor(
                $clienteData['nombreVendedor'] ?? ''
            ),
            'fechaUltimaFacCli' => $clienteData['fechaUltimaFacCli'] ?? null,
            'estadoCli' => 'ACTIVO' // Forzamos estado activo
        ];

        // Actualiza solo los campos de la API, preserva 'entregamos'
        Cliente::updateOrCreate(
            ['codigoCli' => $clienteData['codigoCli']],
            $datosActualizacion
        );
    }
}