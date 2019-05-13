@extends('layouts.master')
@section('content')
    <h2><a href="{{ url('/empresas/'.$empresa_id)}}"><i class="fas fa-arrow-circle-left"></a></i> Detalles del balance</h2>
    <form>
        <table class="table table-bordered table-responsive table-striped mt-5 w-100">
            <tbody >
                <tr class="text-center">
                    <td colspan="5"></td><td>{{$balance->anio}}</td><td>{{$balanceAnterior->anio}}</td>
                </tr>
                <tr>
                    <td colspan="5"><h3>Activo</h3><td><input readonly class="input-right" type="number" min="0" step="any" value="{{$balance->activo->totalActivo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->totalActivo}}"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>A) Activo No Corriente.</h5></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->totalActivoNoCorriente}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->totalActivoNoCorriente}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Inmovilizado intangible.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->inmovilizadoIntangible}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->inmovilizadoIntangible}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Inmovilizado material.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->inmovilizadoMaterial}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->inmovilizadoMaterial}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Inversiones inmobiliarias.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->inversionesInmoviliarias}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->inversionesInmoviliarias}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Inversiones en empresas del grupo y asociadas a largo plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->inversionesEmpresasGrupo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->inversionesEmpresasGrupo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Inversiones financieras a largo plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->inversionesFinancierasLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->inversionesFinancierasLargoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Activos por impuesto diferido.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->activosImpuestoDiferido}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->activosImpuestoDiferido}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VII. Deudores comerciales no corrientes</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoNoCorriente->deudoresComercialesNoCorriente}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoNoCorriente->deudoresComercialesNoCorriente}}"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>B) Activo Corriente.</h5><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->totalActivoCorriente}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->totalActivoCorriente}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Existencias.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->existencias}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->existencias}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Deudores comerciales y otras cuentas a cobrar.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->totalDeudoresComerciales}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->totalDeudoresComerciales}}"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Clientes por ventas y Prestaciones de servicios</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->totalClientesVentas}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->totalClientesVentas}}"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>a) Clientes por ventas y prestaciones de servicios a largo plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->ClientesVentasLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->ClientesVentasLargoPlazo}}"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>b) Clientes por ventas y prestaciones de servicios a corto plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->ClientesVentasCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->ClientesVentasCortoPlazo}}"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Accionistas (socios) por desembolsos exigidos</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->accionistasDesembolsosExigidos}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->accionistasDesembolsosExigidos}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">3. Otros deudores</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->otrosDeudores}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->otrosDeudores}}"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Inversiones en empresas del grupo y asociadas a corto plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->inversionesEmpresasGrupo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->inversionesEmpresasGrupo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Inversiones financieras a corto plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->inversionesFinancierasCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->inversionesFinancierasCortoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Periodificaciones a corto plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->periodificacionesCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->periodificacionesCortoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Efectivo y otros activos líquidos equivalentes</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->activo->activoCorriente->efectivoActivosLiquidos}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->activo->activoCorriente->efectivoActivosLiquidos}}"></td>
                        </tr>         
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="5"><h3 >Pasivo</h3><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->totalPasivo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->totalPasivo}}"></td>
                </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>A) Patrimonio Neto.</h5></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->totalPatrimonioNeto}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->totalPatrimonioNeto}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">A-1) Fondos propios</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->totalFondosPropios}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->totalFondosPropios}}"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">I. Capital.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->totalCapital}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->totalCapital}}"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>1. Capital escriturado.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->capitalEscriturado}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->capitalEscriturado}}"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>2. (Capital no exigido).</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->capitalNoExigido}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->capitalNoExigido}}"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">II. Prima de emisión.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->primaEmision}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->primaEmision}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">III. Reservas.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->totalReservas}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->totalReservas}}"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>1. Reserva de capitalización</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->reservaCapitalizacion}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->reservaCapitalizacion}}"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>2. Otras reservas</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->otrasReservas}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->otrasReservas}}"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">IV. (Acciones y participaciones en patrimonio propias).</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->accionesParticipacionesPatrimonioPropias}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->accionesParticipacionesPatrimonioPropias}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">V. Resultados de ejercicios anteriores.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->resultadosEjerciciosAnteriores}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->resultadosEjerciciosAnteriores}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">VI. Otras aportaciones de socios.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->otrasAportacionesSocios}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->otrasAportacionesSocios}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">VII. Resultado del ejercicio.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->resultadoEjercicio}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->resultadoEjercicio}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">VIII. (Dividendo a cuenta).</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->dividendoCuenta}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->dividendoCuenta}}"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">A-2) Ajustes en patrimonio neto</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->ajustesPatrimonioNeto}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->ajustesPatrimonioNeto}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">A-3) Subvenciones, donaciones y legados recibidos</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->patrimonioNeto->subvencionesDonacionesLegados}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->patrimonioNeto->subvencionesDonacionesLegados}}"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>B) Pasivo No Corriente</h5></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->totalPasivoNoCorriente}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->totalPasivoNoCorriente}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Provisiones a largo plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->provisionesLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->provisionesLargoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Deudas a largo plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->totalDeudasLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->totalDeudasLargoPlazo}}"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Deudas con entidades de crédito.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->deudasEntidadesCredito}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->deudasEntidadesCredito}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Acreedores por arrendamiento financiero</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->acreedoresArrendamientoFinanciero}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->acreedoresArrendamientoFinanciero}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">3. Otras deudas a largo plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->otrasDeudasLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->otrasDeudasLargoPlazo}}"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Deudas con empresas del grupo y asociadas a largo plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->deudasEmpresasGrupo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->deudasEmpresasGrupo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Pasivos por impuesto diferido.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->pasivosImpuestoDiferido}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->pasivosImpuestoDiferido}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Periodificaciones a largo plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->periodificacionesLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->periodificacionesLargoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Acreedores comerciales no corrientes</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->acreedoresComercialesNoCorrientes}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->acreedoresComercialesNoCorrientes}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VII. Deuda con características especiales a largo plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoNoCorriente->deudaCaracteristicasEspeciales}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoNoCorriente->deudaCaracteristicasEspeciales}}"></td>
                        </tr>
                    <tr>
                        <td></td><td colspan="4"><h5>C) Pasivo Corriente</h5></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->totalPasivoCorriente}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->totalPasivoCorriente}}"></td>
                    </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">I. Provisiones a corto plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->provisionesCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->provisionesCortoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">II. Deudas a corto plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->totalDeudasCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->totalDeudasCortoPlazo}}"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Deuda con entidades de crédito.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->deudaEntidadesCredito}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->deudaEntidadesCredito}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Acreedores por arrendamiento financiero</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->acreedoresArrendamientoFinanciero}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->acreedoresArrendamientoFinanciero}}"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">3. Otras deudas a corto plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->otrasDeudasCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->otrasDeudasCortoPlazo}}"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">III. Deudas con empresas del grupo y asociadas a corto plazo.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->deudasEmpresasGrupo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->deudasEmpresasGrupo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">IV. Acreedores comerciales y otras cuentas a pagar.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas}}"></td>
                        </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">1. Proveedores.</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->totalProveedores}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->totalProveedores}}"></td>
                            </tr>
                                <tr>
                                    <td colspan="4"></td><td>a) Proveedores a largo plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->proveedoresLargoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->proveedoresLargoPlazo}}"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td><td>b) Proveedores a corto plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->proveedoresCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->proveedoresCortoPlazo}}"></td>
                                </tr>
                            <tr>
                                <td colspan="3"></td><td colspan="2">2. Otros acreedores</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->otrosAcreedores}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->otrosAcreedores}}"></td>
                            </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">V. Periodificaciones a corto plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->periodificacionesCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->periodificacionesCortoPlazo}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="3">VI. Deuda con características especiales a corto plazo</td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balance->pasivo->pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo}}"></td><td><input class="input-right" readonly type="number" min="0" step="any" value="{{$balanceAnterior->pasivo->pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo}}"></td>
                        </tr>
                    <tr>
                        <td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="45%"></td><td width="10%"></td><td width="10%"></td>
                    </tr>
            </tbody>
        </table>
    </form>
@stop
