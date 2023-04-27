<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{$componentName}}</b></h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Elige el usuario</h6>
                                <div class="form-group">
                                    <select wire:model="userId" class="form-control">
                                        <option value="0">Todos</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Elige el tipo de reporte</h6>
                                <div class="form-group">
                                    <select wire:model="reportType" class="form-control">
                                        <option value="0">Ventas del día</option>
                                        <option value="1">Ventas por fecha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateFrom" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateTo" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button wire:click="$refresh" class="btn btn-dark btn-block">
                                    Consultar
                                </button>

                                <a class="btn btn-dark btn-block {{count($data) <1 ? 'disabled' : '' }}"
                                href="{{ url('report/pdf' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}" target="_blank">Generar PDF</a>

                                <a  class="btn btn-dark btn-block {{count($data) <1 ? 'disabled' : '' }}"
                                href="{{ url('report/excel' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}" target="_blank">Exportar a Excel</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <!--TABLAE-->
                        <div class="table-responsive">

                            <table class="table table-bordered table striped mt-1">
                                <thead class="text-white" style="background: #3B3F5C">
                                    <tr>
                                        <th class="table-th text-white text-center">FOLIO</th>
                                        <th class="table-th text-white text-center">TOTAL</th>
                                        <th class="table-th text-white text-center">CANT.</th>
                                        <th class="table-th text-white text-center">ESTATUS</th>
                                        <th class="table-th text-white text-center">USUARIO</th>
                                        <th class="table-th text-white text-center">FECHA</th>
                                        <th class="table-th text-white text-center" >OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) <1)
                                    <tr><td colspan="7"><h5>Sin Resultados</h5></td></tr>
                                    @endif
                                    @foreach($data as $d)
                                    <tr>
                                        <td class="text-center"><h6>{{$d->id}}</h6></td>
                                        <td class="text-center"><h6>Q {{number_format($d->total,2)}}</h6></td>
                                        <td class="text-center"><h6>{{$d->items}}</h6></td>
                                        <td class="text-center"><h6>{{$d->status}}</h6></td>
                                        <td class="text-center"><h6>{{$d->user}}</h6></td>
                                        <td class="text-center">
                                            <h6>
                                                {{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}
                                            </h6>
                                        </td>
                                        <td class="text-center" >
                                            <button wire:click.prevent="getDetails({{$d->id}})"
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-list"></i>
                                            </button>
                                            <button type="button" onclick="rePrint({{$d->id}})"
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            <button hidden
                                                class="btn btn-dark btn-sm"
                                                onclick="javascript:demoFromHTML()"
                                                onclick="exportPdf()"

                                                class="table table-bordered">
                                                <i class="fas fa-list"> PDF</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div hidden id="customers">
                            <table class="table table-bordered table striped mt-1">
                                <thead class="text-white" style="background: #3B3F5C">

                                    <tr>
                                        <th class="table-th text-white text-center">FOLIO</th>
                                        <th class="table-th text-white text-center">TOTAL</th>
                                        <th class="table-th text-white text-center">ITEMS</th>
                                        <th class="table-th text-white text-center">ESTATUS</th>
                                        <th class="table-th text-white text-center">USUARIO</th>
                                        <th class="table-th text-white text-center">FECHA</th>
                                        <th class="table-th text-white text-center" >OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td class="text-center"><h6>{{$d->id}}</h6></td>
                                        <td class="text-center"><h6>Q {{number_format($d->total,2)}}</h6></td>
                                        <td class="text-center"><h6>{{$d->items}}</h6></td>
                                        <td class="text-center"><h6>{{$d->status}}</h6></td>
                                        <td class="text-center"><h6>{{$d->user}}</h6></td>
                                            <h6>
                                                {{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}
                                            </h6>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.reports.sales-detail')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>

<script>
         function exportPdf(){
            var pdf = new jsPDF();

            pdf.setFontSize(16);
            pdf.setTextColor(0,0,0);
            pdf.setFont("helvetica");
            pdf.setFontType("bold");

            pdf.text(20,30,"Moto Centro San José");
            pdf.text(20,36,"San José Poaquil, \nChimaltenango");

            pdf.text(70, 240, "F_______________________");
            pdf.text(90, 248,"Carlos Álvarez");
            pdf.text(95, 256,"Propietario");

            var image1 = new Image();
            image1.src = "assets/img/livewire_logo.png"; /// URL de la imagen
            pdf.addImage(image1, 'png', 158, 15, 30, 30);

            pdf.text(20, 60, "-----------------------------------------------------------------------------------------");

            pdf.autoTable({html:'#table',
                startY: 80,

                //theme:'grid',
                columnStyles:{
                    0:{cellWidth:18},
                    1:{cellWidth:70},
                    2:{cellWidth:35},
                    3:{cellWidth:20},
                    4:{cellWidth:25}
                },
                bodyStyles: {lineColor: [1,1,1]},
                styles:{minCellHeight:10},
                styles: {
                    halign: 'center'
                },
                    margin : {
                        top: 80,
                        bottom: 60,
                        left: 20
                }
            });
            window.open(URL.createObjectURL(pdf.output("blob")))
         }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        flatpickr(document.getElementsByClassName('flatpickr'),{
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                    ],
                    longhand: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                    ],
                },

            }

        })


        //eventos
        window.livewire.on('show-modal', Msg =>{
            $('#modalDetails').modal('show')
        })
    })

    function rePrint(saleId)
    {
        window.open("print://" + saleId,  '_self').close()
    }
</script>
