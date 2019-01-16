@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$users}}</div>
                                    <div>@lang('adminDashboard.users')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.users')}}">
                            <div class="panel-footer">
                                <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-key fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$keys}}</div>
                                    <div>@lang('adminDashboard.keys')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.keys')}}">
                            <div class="panel-footer">
                                <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-lock fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$locks}}</div>
                                    <div>@lang('adminDashboard.locks')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.locks')}}">
                            <div class="panel-footer">
                                <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$messages}}</div>
                                    <div>@lang('adminDashboard.messages')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.messsages')}}">
                            <div class="panel-footer">
                                <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                            <div class="col-lg-12">

                            </div>
                            <!-- /.col-lg-12 -->
            </div>
            <div style="width: 75%"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            		<canvas id="canvas" width="1446" height="722" class="chartjs-render-monitor" style="display: block; width: 723px; height: 361px;"></canvas>
            	</div>
            	<button id="randomizeData">Randomize Data</button>
            	<script>
            		var barChartData = {
            			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            			datasets: [{
            				label: 'Dataset 2',
            				backgroundColor: window.chartColors.blue,
            				data: [
            					10,
            					20,
            					15,
            					17,
            					5,
            					30,
            					15
            				]
            			}, {
            				label: 'Dataset 3',
            				backgroundColor: window.chartColors.green,
            				data: [
            					15,
            					13,
            					18,
            					22,
            					5,
            					12,
            					5
            				]
            			}]

            		};
            		window.onload = function() {
            			var ctx = document.getElementById('canvas').getContext('2d');
            			window.myBar = new Chart(ctx, {
            				type: 'bar',
            				data: barChartData,
            				options: {
            					title: {
            						display: true,
            						text: 'Chart.js Bar Chart - Stacked'
            					},
            					tooltips: {
            						mode: 'index',
            						intersect: false
            					},
            					responsive: true,
            					scales: {
            						xAxes: [{
            							stacked: true,
            						}],
            						yAxes: [{
            							stacked: true
            						}]
            					}
            				}
            			});
            		};

            		document.getElementById('randomizeData').addEventListener('click', function() {
            			barChartData.datasets.forEach(function(dataset) {
            				dataset.data = dataset.data.map(function() {
            					return randomScalingFactor();
            				});
            			});
            			window.myBar.update();
            		});
            	</script>
@stop
