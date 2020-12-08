@extends('manage.manage-layout')

@section('title', 'Tableau de bord de DrinkCenter')

@section('manage-content')
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4" style="text-transform: uppercase; font-size: 12px;">Dashboard</h1>
                        {{-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> --}}
                       
                        <div class="row">
                             <a href="{{route('categories.index')}}">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background: #81233e; text-transform: uppercase; font-size: 16px; ">
                                    <div class="card-body" style="color: #fff;">Category</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View all categories</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('products.index')}}">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4" style="background: #81233e; text-transform: uppercase;">
                                    <div class="card-body" style="color: #fff;">Products</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View all PRODUCTS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('users.index')}}">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4" style="background: #81233e; text-transform: uppercase;">
                                    <div class="card-body" style="color: #fff;">Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View all Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('volumes.index')}}"></a>
                            <div class="col-xl-3 col-md-6" style="">
                                <div class="card bg-info text-white mb-4" style="background: #81233e; text-transform: uppercase;">
                                    <div class="card-body" style="color: white;">volumes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View all volumes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="card mb-4">
                            <div class="card-body" style="display: flex; justify-content: space-between;">                               
                                <h6>10 dernières commandes</h6>
                                <a href="{{route('orders.index')}}" class="btn btn-info">tous les commandes</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table roundedCorners" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                {{-- <th>id</th> --}}
                                                <th>noms du client</th>
                                                <th>address</th>
                                                <th>tel</th>
                                                <th>prix</th>
                                                <th>delivree</th>
                                                <th>status</th>
                                                <th>date</th>
                                                <th>action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               {{-- <th>id</th> --}}
                                                <th>noms du client</th>
                                                <th>address</th>
                                                <th>tel</th>
                                                <th>prix</th>
                                                <th>delivree</th>
                                                <th>status</th>
                                                <th>date</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="order in orders">
                                                {{-- <td>@{{order.id}}</td> --}}
                                                <td>@{{order.last_name}} @{{order.first_name}}</td>
                                                <td>@{{order.address}}</td>
                                                <td>@{{order.phonenumber}}</td>
                                                <td>@{{order.amount}} <small>xaf</small></td>
                                                <td v-if="order.delivered == 0"><span style="color: red">non</span></td>
                                                <td v-if="order.delivered == 1"><span style="color: green">oui</span></td>
                                                <td v-if="order.status == 0"><span style="color: red">non paye</span></td>
                                                <td v-if="order.status == 1"><span style="color: blue">paye</span></td>
                                                <td>@{{new Date(order.created_at).toDateString()}}</td>
                                                <td><a v-bind:href="'/manage/viewOrder/'+ order.id" class="btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        var layoutSidenav = new Vue({
            el: '#layoutSidenav',
            data: {
                orders: {},
                audioUrl: "//<?php echo Request::getHost(); ?>:8000/audio/piece-of-cake.mp3"
            },
            mounted () {
                this.getOrders()
                this.listen()
            },
            updated () {
                this.another()
            },
            methods: {

               async getOrders () {
                   await axios.get('http://<?php echo Request::getHost(); ?>:8000/api/getOrders')
                        .then((response)=>{
                            this.orders = response.data
                        })
                        .catch(function (error){
                            console.log(e)
                        })
               },

               listen () {
                    Echo.channel('order')
                        .listen('NewOrder', (order) => {
                            var audio = new Audio(this.audioUrl) 
                            audio.muted = false
                            if(this.orders.length == 10) {
                                this.orders.pop()
                            }
                            this.orders.unshift(order.order)
                            console.log(this.audioUrl)
                            audio.muted = true
                            audio.play()
                    })
                },

                another () {
                    Echo.channel('deliveryConfirmed')
                        .listen('DeliveryConfirmed', (order) => {
                            const index = this.orders.findIndex((o) => o.id === order.order.id)
                            this.orders[index] = order.order
                            this.getOrders()
                        })
                }


            }
        })
    </script>
@endsection