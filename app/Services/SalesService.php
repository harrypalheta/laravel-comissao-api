<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SalesService
{
    private string $file = 'sales.json';

    public function __construct()
    {
        if (!Storage::exists($this->file)) {
            Storage::put($this->file, json_encode([]));
        }
    }

    public function all(): array
    {
        return json_decode(Storage::get($this->file), true);
    }

    public function create(array $data): array
    {
        $valor_total = $data['valor_total'];
        $tipo_venda = $data['tipo_venda'];

        $comissoes = [
            'plataforma' => $valor_total * 0.10,
            'produtor'   => $tipo_venda === 'direta' ? $valor_total * 0.90 : $valor_total * 0.60,
            'afiliado'   => $tipo_venda === 'afiliada' ? $valor_total * 0.30 : 0,
        ];

        $registro = [
            'id' => Str::uuid()->toString(),
            'valor_total' => $valor_total,
            'tipo_venda' => $tipo_venda,
            'comissoes' => $comissoes,
        ];

        $all = $this->all();
        $all[] = $registro;
        Storage::put($this->file, json_encode($all));

        return $registro;
    }

    public function delete(string $id): bool
    {
        $all = $this->all();
        $filtered = array_filter($all, fn($sale) => $sale['id'] !== $id);

        if (count($all) === count($filtered)) return false;

        Storage::put($this->file, json_encode(array_values($filtered)));
        return true;
    }
}
