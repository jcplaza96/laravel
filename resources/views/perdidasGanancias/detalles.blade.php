@extends('layouts.master')
@section('content')
    <h2><a href="{{ url('/empresas/'.$empresa_id)}}"><i class="fas fa-arrow-circle-left"></a></i> Detalles del informe de perdidas y ganancias</h2>
    <form>
        <table class="table table-bordered table-responsive table-striped mt-5 w-100">
            <tbody>
                <tr class="text-center">
                    <td colspan="5"></td><td>{{$perdidasGanancias->anio}}</td><td>{{$perdidasGananciasAnterior->anio}}</td>
                </tr>
                    <tr>
                        <td></td><td colspan="4">1. Importe neto de la cifra de negocios.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->importeNetoCifraNegocios}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->importeNetoCifraNegocios}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">2. Variación de existencias de productos terminados y en curso </td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->variacionExistenciasProductos}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->variacionExistenciasProductos}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">3. Trabajos realizados por la empresa para su activo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->trabajosEmpresaActivo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->trabajosEmpresaActivo}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">4. Aprovisionamientos.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->aprovisionamientos}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->aprovisionamientos}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">5. Otros ingresos de explotación.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->otrosIngresosExplotacion}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->otrosIngresosExplotacion}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">6. Gastos de personal.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->gastosPersonal}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->gastosPersonal}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">7. Otros gastos de explotación.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->otrosGastosExplotacion}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->otrosGastosExplotacion}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">8. Amortización del inmovilizado.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->amortizaciónInmovilizado}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->amortizaciónInmovilizado}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">9. Imputación de subvenciones de inmovilizado no financiero y otras.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->imputacionSubvencionesInmovilizado}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->imputacionSubvencionesInmovilizado}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">10. Excesos de provisiones.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->excesosProvisiones}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->excesosProvisiones}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">11. Deterioro y resultado por enajenaciones del inmovilizado.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->deterioroResultadoEnajenaciones}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->deterioroResultadoEnajenaciones}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">12. Otros resultados</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->otrosResultados}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->otrosResultados}}"></td>
                    </tr>
                <tr>
                    <td colspan="5"><h4>A) RESULTADO DE EXPLOTACION</h4><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGanancias->resultadoExplotacion}}"></td><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->resultadoExplotacion}}"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4">13. Ingresos financieros</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->totalIngresosFinancieros}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->totalIngresosFinancieros}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">a) Imputación de subvenciones, donaciones y legados de carácter financiero</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->input class="input-right"acionSubvencionesFinanciero}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->input class="input-right"acionSubvencionesFinanciero}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">b) Otros ingresos financieros</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->otrosIngresosFinancieros}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->otrosIngresosFinancieros}}"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4">14. Gastos financieros</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->gastosFinancieros}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->gastosFinancieros}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">15. Variación de valor razonable en instrumentos financieros</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->variacionValorRazonable}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->variacionValorRazonable}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">16. Diferencias de cambio</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->diferenciasCambio}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->diferenciasCambio}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">17. Deterioro y resultado por enajenaciones de instrumentos financieros</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->deterioroInstrumentosFinancieros}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->deterioroInstrumentosFinancieros}}"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">18. Otros ingresos y gastos de carácter financiero</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->totalIngresosGastosFinancieros}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->totalIngresosGastosFinancieros}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">a) Incorporación al activo de gastos financieros</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->incorporacionActivoFinanciero}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->incorporacionActivoFinanciero}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">b) Ingresos financieros derivados de convenios de acreedores</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->ingresosConvenioAcreedores}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->ingresosConvenioAcreedores}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">c) Resto de ingresos y gastos</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->restoIngresosGastos}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->restoIngresosGastos}}"></td>
                        </tr>
                <tr>
                    <td colspan="5"><h4>B) RESULTADO FINANCIERO</h4><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGanancias->resultadoFInanciero}}"></td><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->resultadoFInanciero}}"></td>
                </tr>
                <tr>
                    <td colspan="5"><h4>C) RESULTADO ANTES DE IMPUESTOS</h4><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGanancias->resultadoAntesImpuestos}}"></td><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->resultadoAntesImpuestos}}"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4">19. Impuestos sobre beneficios</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGanancias->impuestosBeneficios}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->impuestosBeneficios}}"></td>
                    </tr>
                <tr>
                    <td colspan="5"><h4>D. RESULTADO DEL EJERCICIO</h4><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGanancias->resultadoEjercicio}}"></td><td><input class="input-right" readonly class="w-100" type="number" min="0" step="any" value="{{$perdidasGananciasAnterior->resultadoEjercicio}}"></td>
                </tr>
                
                <tr>
                    <td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="45%"></td><td width="10%"></td><td width="10%"></td>
                </tr>
            </tbody>
        </table>
    </form>
@stop
