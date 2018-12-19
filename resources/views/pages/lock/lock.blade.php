@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')



<div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-unlock fa-fw"></i> <strong>Asier</strong> apertura de cerradura
                                  <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-key fa-fw"></i> Aitor ha creado llave
                                  <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-trash-o fa-fw"></i> Message Sent
                                  <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-lock fa-fw"></i> New Task
                                  <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-exclamation-circle fa-fw"></i> Server Rebooted
                                  <span class="pull-right text-muted small"><em>11:32 AM</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                  <span class="pull-right text-muted small"><em>11:13 AM</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                  <span class="pull-right text-muted small"><em>10:57 AM</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                  <span class="pull-right text-muted small"><em>9:49 AM</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item">
                                  <i class="fa fa-money fa-fw"></i> Payment Received
                                  <span class="pull-right text-muted small"><em>Yesterday</em>
                                  </span>
                              </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->


                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>



@stop
