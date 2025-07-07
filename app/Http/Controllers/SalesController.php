<?php

namespace App\Http\Controllers;

use App\Services\SalesService;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct(private SalesService $salesService) {}

    public function index()
    {
        return response()->json($this->salesService->all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'valor_total' => 'required|numeric|min:0',
            'tipo_venda' => 'required|in:direta,afiliada',
        ]);

        $result = $this->salesService->create($request->only('valor_total', 'tipo_venda'));
        return response()->json($result, 201);
    }

    public function destroy($id)
    {
        $deleted = $this->salesService->delete($id);
        return $deleted
            ? response()->json(null, 204)
            : response()->json(['erro' => 'Simulação não encontrada'], 404);
    }
}
