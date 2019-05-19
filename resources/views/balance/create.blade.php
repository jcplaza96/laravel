@extends('layouts.master')
@section('content')
    <h2><a href="{{ url('/empresas/'.$empresa_id)}}"><i class="fas fa-arrow-circle-left"></a></i> Detalles del balance</h2>
    <form action="" method="post" class="mt-4">
        {{ csrf_field() }}
        <div class="text-right">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-outline-dark">Vaciar Campos</button>
            <a class="btn btn-danger" href="{{ url('/empresas/'.$empresa_id)}}">Cancelar</a>
        </div>
        <table class="table table-bordered table-responsive table-striped mt-2 w-100">
            <tbody >
                <tr class="text-center">
                    <td colspan="5"></td><td><input required id="anio" class="input-right" name="balance[{{++$i}}][]" type="number" min="2" step="any" value=""></td><td><input id="anioAnterior" readonly class="input-right" name="balance[{{$i}}][]" type="number" min="1" step="any" value=""></td>
                </tr>
                <tr>
                    <td colspan="5"><h3>Activo</h3><td><input class="input-right" name="balance[{{++$i}}][]" type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>A) Activo No Corriente.</h5></td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Inmovilizado intangible.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Inmovilizado material.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Inversiones inmobiliarias.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Inversiones en empresas del grupo y asociadas a largo plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Inversiones financieras a largo plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Activos por impuesto diferido.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VII. Deudores comerciales no corrientes</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>B) Activo Corriente.</h5><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Existencias.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Deudores comerciales y otras cuentas a cobrar.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Clientes por ventas y Prestaciones de servicios</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>a) Clientes por ventas y prestaciones de servicios a largo plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>b) Clientes por ventas y prestaciones de servicios a corto plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Accionistas (socios) por desembolsos exigidos</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">3. Otros deudores</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Inversiones en empresas del grupo y asociadas a corto plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Inversiones financieras a corto plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Periodificaciones a corto plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Efectivo y otros activos líquidos equivalentes</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>         
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="5"><h3 >Pasivo</h3><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>A) Patrimonio Neto.</h5></td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">A-1) Fondos propios</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">I. Capital.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>1. Capital escriturado.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>2. (Capital no exigido).</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">II. Prima de emisión.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">III. Reservas.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>1. Reserva de capitalización</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>2. Otras reservas</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">IV. (Acciones y participaciones en patrimonio propias).</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">V. Resultados de ejercicios anteriores.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">VI. Otras aportaciones de socios.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">VII. Resultado del ejercicio.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">VIII. (Dividendo a cuenta).</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">A-2) Ajustes en patrimonio neto</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">A-3) Subvenciones, donaciones y legados recibidos</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>B) Pasivo No Corriente</h5></td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Provisiones a largo plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Deudas a largo plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Deudas con entidades de crédito.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Acreedores por arrendamiento financiero</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">3. Otras deudas a largo plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Deudas con empresas del grupo y asociadas a largo plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Pasivos por impuesto diferido.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Periodificaciones a largo plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Acreedores comerciales no corrientes</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VII. Deuda con características especiales a largo plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>C) Pasivo Corriente</h5></td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Provisiones a corto plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Deudas a corto plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Deuda con entidades de crédito.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Acreedores por arrendamiento financiero</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">3. Otras deudas a corto plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Deudas con empresas del grupo y asociadas a corto plazo.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Acreedores comerciales y otras cuentas a pagar.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Proveedores.</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>a) Proveedores a largo plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>b) Proveedores a corto plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Otros acreedores</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Periodificaciones a corto plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Deuda con características especiales a corto plazo</td><td><input class="input-right" name="balance[{{++$i}}][]"  type="number" min="0" step="any" value="0"></td><td><input class="input-right" name="balance[{{$i}}][]"  type="number" min="0" step="any" value="0"></td>
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
