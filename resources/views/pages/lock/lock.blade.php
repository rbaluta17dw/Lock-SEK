@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')



<div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Cerradura
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="col-sm-3"><!--left col-->


                            <div class="text-center">
                              <img src="https://cdn.website.thryv.com/716ee54454d94272ba5bf64e492f084d/MOBILE/png/961.png" class="avatar img-thumbnail" alt="avatar">
                              <div class="prf-img-inp config">
                                <input type="file" class="text-center center-block file-upload">
                              </div>

                            </div></hr><br>

                          </div><!--/col-3-->
                          <div class="col-sm-9">
                            <div class="tab-content">
                              <hr>
                                @csrf
                                <div class="form-group">

                                  <div class="col-xs-6">
                                    <label for="first_name"><h4>Nombre de la cerradura</h4></label>
                                    <p>Cerradura 1</p>
                                  </div>
                                </div>




                              <hr>
                            </div>
                          </div><!--/col-9-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Permisos
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Usuario</th>
                                                    <th>Time</th>
                                                    <th>Llaves</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                </tr>
                                                <tr>
                                                    <td>3324</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:03 PM</td>
                                                    <td>$724.17</td>
                                                </tr>
                                                <tr>
                                                    <td>3323</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:00 PM</td>
                                                    <td>$23.71</td>
                                                </tr>
                                                <tr>
                                                    <td>3322</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:49 PM</td>
                                                    <td>$8345.23</td>
                                                </tr>
                                                <tr>
                                                    <td>3321</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:23 PM</td>
                                                    <td>$245.12</td>
                                                </tr>
                                                <tr>
                                                    <td>3320</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:15 PM</td>
                                                    <td>$5663.54</td>
                                                </tr>
                                                <tr>
                                                    <td>3319</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:13 PM</td>
                                                    <td>$943.45</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
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
                              <a href="#" class="list-group-item list-group-item-success">
                                  <i class="fa fa-unlock fa-fw"></i> <span class="negrita">Asier</span> apertura de cerradura
                                  <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item list-group-item-info">
                                  <i class="fa fa-key fa-fw"></i> <span class="negrita">Aitor</span> ha creado llave
                                  <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item list-group-item-warning">
                                  <i class="fa fa-trash-o fa-fw"></i> Message Sent
                                  <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                  </span>
                              </a>
                              <a href="#" class="list-group-item list-group-item-danger">
                                  <i class="fa fa-lock fa-fw"></i> Intento de acceso
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
