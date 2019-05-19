@extends('layouts.master')
@section('content')
    <h2><a href="{{ url('/empresas/'.$empresa_id)}}"><i class="fas fa-arrow-circle-left"></a></i> Detalles del informe de perdidas y ganancias</h2>
    <form action="" method="post" class="mt-4">
        {{ csrf_field() }}
        <div class="text-right">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-outline-dark">Vaciar Campos</button>
            <a class="btn btn-danger" href="{{ url('/empresas/'.$empresa_id)}}">Cancelar</a>
        </div>
        <table class="table table-bordered table-responsive table-striped mt-2 w-100">
            <tbody>
                <tr class="text-center">
                    <td colspan="5"></td><td><input required id="anio" class="input-right" name="informe[{{++$i}}][]" type="number" min="2" step="any" value=""></td><td><input id="anioAnterior" readonly class="input-right" name="informe[{{$i}}][]" type="number" min="1" step="any" value=""></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4">1. Importe neto de la cifra de negocios.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">2. Variación de existencias de productos terminados y en curso </td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">3. Trabajos realizados por la empresa para su activo.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">4. Aprovisionamientos.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">5. Otros ingresos de explotación.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">6. Gastos de personal.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">7. Otros gastos de explotación.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">8. Amortización del inmovilizado.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">9. Imputación de subvenciones de inmovilizado no financiero y otras.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">10. Excesos de provisiones.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">11. Deterioro y resultado por enajenaciones del inmovilizado.</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">12. Otros resultados</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                <tr>
                    <td colspan="5"><h4>A) RESULTADO DE EXPLOTACION</h4><td><input name="informe[{{++$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4">13. Ingresos financieros</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">a) Imputación de subvenciones, donaciones y legados de carácter financiero</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">b) Otros ingresos financieros</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input  name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4">14. Gastos financieros</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">15. Variación de valor razonable en instrumentos financieros</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">16. Diferencias de cambio</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">17. Deterioro y resultado por enajenaciones de instrumentos financieros</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                    <tr>
                        <td></td><td colspan="4">18. Otros ingresos y gastos de carácter financiero</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">a) Incorporación al activo de gastos financieros</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">b) Ingresos financieros derivados de convenios de acreedores</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">c) Resto de ingresos y gastos</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                <tr>
                    <td colspan="5"><h4>B) RESULTADO FINANCIERO</h4><td><input name="informe[{{++$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td>
                </tr>
                <tr>
                    <td colspan="5"><h4>C) RESULTADO ANTES DE IMPUESTOS</h4><td><input name="informe[{{++$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4">19. Impuestos sobre beneficios</td><td><input name="informe[{{++$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                <tr>
                    <td colspan="5"><h4>D. RESULTADO DEL EJERCICIO</h4><td><input name="informe[{{++$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td><td><input name="informe[{{$i}}][]" class="input-right"  class="w-100" type="number" min="0" step="any" value="0"></td>
                </tr>
                
                <tr class="invisible">
                    <td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="45%"></td><td width="10%"></td><td width="10%"></td>
                </tr>
            </tbody>
        </table>
        <div class="text-right mb-4">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-outline-dark">Vaciar Campos</button>
            <a class="btn btn-danger" href="{{ url('/empresas/'.$empresa_id)}}">Cancelar</a>
        </div>
    </form>
    <script>
        $( document ).ready(function() {
            $("#anio").focusout(function(){
                if($("#anio").val()-1>0){
                    $("#anioAnterior").val($("#anio").val()-1);
                }
            });

            $(".btn-outline-dark").click(function() {
                $("input").val(0);
            });
        });
    </script>
@stop
