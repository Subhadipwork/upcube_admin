@extends('admin.layouts.layout')


@section('content')
    
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dark Sidebar</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                            <li class="breadcrumb-item active">Dark Sidebar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                                @if ($totalsells['totalOrders'] > 0)
                                <h4 class="mb-2">{{$totalsells['totalOrders']}}</h4>
                                <p class="text-muted mb-0"><span class="{{ $totalsells['isDecrease'] ? 'text-danger' : 'text-success' }} fw-bold font-size-12 me-2">
                                    <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ number_format(abs($totalsells['percentageChange']), 2) }}%
                                </span>from previous period</p>
                          
                                @else  
                                <h4 class="mb-2"></h4>
                                <p class="text-muted mb-0"><span class="{{ $totalsells['isDecrease'] ? 'text-danger' : 'text-success' }} fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ number_format(abs($totalsells['percentageChange']), 2) }}%</span>from previous period</p>
                           
                                @endif
                           </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                            
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Orders</p>

                                @if ($newOrders['newOrdersCount'] > 0)
                                    
                               
                                <h4 class="mb-2">{{$newOrders['newOrdersCount']}}</h4>
                                <p class="text-muted mb-0">
                                    <span class="{{ $newOrders['isDecrease'] ? 'text-danger' : 'text-success' }} fw-bold font-size-12 me-2">
                                        <i class="ri-arrow-{{ $newOrders['isDecrease'] ? 'right-down' : 'right-up' }}-line me-1 align-middle"></i>
                                        {{ number_format(abs($newOrders['percentageChange']), 2) }}%
                                    </span>   
                                from previous period</p>
                                @else
                                <h4 class="mb-2">{{$newOrders['totalOrdersCount']}}</h4>
                                <p class="text-muted mb-0">
                                Only Genrate {{$newOrders['totalOrdersCount']}} Orders Stating Manth</p>
                                @endif
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Users</p>
                                <h4 class="mb-2">8246</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Unique Visitors</p>
                                <h4 class="mb-2">29670</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Pie Chart</h4>
                        <span class="d-block mb-4">{{$totalsells['totalOrdersCount']}}</span>
                        <div id="pie_chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <select class="form-select shadow-none form-select-sm">
                                <option selected>Apr</option>
                                <option value="1">Mar</option>
                                <option value="2">Feb</option>
                                <option value="3">Jan</option>
                            </select>
                        </div>
                        <h4 class="card-title mb-4">Monthly Earnings</h4>
                        
                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>3475</h5>
                                    <p class="mb-2 text-truncate">Market Place</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>458</h5>
                                    <p class="mb-2 text-truncate">Last Week</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>9062</h5>
                                    <p class="mb-2 text-truncate">Last Month</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-1">
                            <div id="donut-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
        </div>


    </div> <!-- container-fluid -->
</div>
@endsection

{{-- Dynamic seript for chart --}}


@push('scripts')
{{-- dashbord --}}
{{-- <script src="{{ asset('admin_assets/plugins/apexcharts/apexcharts.min.js') }}"></script> --}}
<script src="{{ asset('admin_assets/js/pages/dashboard.init.js') }}"></script>
{{-- <script src="{{ asset('admin_assets/js/pages/apexcharts.init.js') }}"></script> --}}
{{-- <script src="{{ asset('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

<script>
//     var orders = {
//   "placed": 266,
//   "accepted": 260,
//   "shipped": 237,
//   "out for delivery": 246,
//   "delivered": 246,
//   "cancelled": 231,
//   "returned": 258
// };
var orders = @json($paichatdata);
var value = Object.values(orders);
var keys = Object.keys(orders);
// console.log(keys); 
    const pieChartOptions = {
  chart: {
    height: 320,
    type: "donut"
  },
  series: value,
  labels: keys,
  colors: ["#1cbb8c", "#0f9cf3", "#fcb92c", "#4aa3ff", "#f32f53", "#a3a1ff", "#ff7f50"],
  legend: {
    show: true,
    position: "bottom",
    horizontalAlign: "center",
    verticalAlign: "middle",
    floating: false,
    fontSize: "14px",
    offsetX: 0,
    offsetY: 5
  },
  responsive: [{
    breakpoint: 600,
    options: {
      chart: {
        height: 240
      },
      legend: {
        show: false
      }
    }
  }]
};

const pieChart = new ApexCharts(document.querySelector("#pie_chart"), pieChartOptions);
pieChart.render();

</script>
@endpush


{{-- Dynamic seript for chart --}}

{{-- @push('styles')
    
@endpush --}}