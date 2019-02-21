@extends('layouts.landing')
@section('title', 'LockSEK')
@section('content')

<!-- Modal -->
<div class="modal fade" id="errorsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atención!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
        @if ($errors->any())
        <script type="text/javascript">
          $(document).ready(function(){
            $('#errorsModal').modal('show');
          });
        </script>
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->

<!-- Modal -->
<div class="modal fade" id="succesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atención!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
        @if (Session::has('messageOk'))
        <script type="text/javascript">
          $(document).ready(function(){
            $('#succesModal').modal('show');
          });
        </script>
        <div class="alert alert-success">{!! Session::get('messageOk') !!}</div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light"  id="section-home">
  
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-6">
        <h2 class="heading mb-3">LockSEK</h2>
        <div class="sub-heading">
          <p class="mb-4">LockSEK es una plataforma para administrar llaves para cerraduras electrónicas accionadas por dispositivos USB </p>
          <p class="mb-5"><a class="btn btn-success btn-lg pb_btn-pill smoothscroll" href="#section-contact"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">Contacta con nosotros</span></a></p>
        </div>
      </div>
      <div class="col-md-1">
      </div>
      @guest
      
      
      
      <div class="col-md-5 relative align-self-center" >
        <form method="POST" action="{{ route('register') }}" id="register" class="bg-white rounded pb_form_v1 reg">
          @csrf
          <h2 class="mb-4 mt-0 text-center">REGÍSTRATE</h2>
          <div class="form-group">
            <input type="email" name="email" class="form-control pb_height-50 reverse" placeholder="Email" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <input type="password" id="password" name="password" class="form-control pb_height-50 reverse" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control pb_height-50 reverse" placeholder="Repite la Contraseña">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Registrarse">
          </div>
        </form>
      </div>
      @endguest
    </div>
  </div>
</section>
<!-- END section -->

<section class="pb_section bg-light pb_slant-white pb_pb-250" id="section-features">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-6 text-center mb-5">
        <h2>Producto</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md- col-sm-6">
        <div class="media d-block pb_feature-v1 text-left">
          <div class="media-body">
            <iframe id="video" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2">
      </div>
      <div class="col-lg-4 col-md- col-sm-6">
        <div class="media d-block pb_feature-v1 text-left">
          <div class="media-body">
            <p class="text-sans-serif">En este video te explicamos de forma sencilla el funcionamiento de nuestra plataforma, como registrar cerraduras, crear llaves y otorgar permisos a otros usuarios.</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
</section>
<!-- END section -->

<section class="pb_section pb_slant-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5">
        <img src="{{asset('assets/img/familia.svg')}}" alt="Image placeholder" class="img-fluid">
      </div>
      <div class="col-lg-8 pl-md-5 pl-sm-0">
        <div class="row">
          <div class="col">
            <h2>Para uso particular</h2>
            <p class="pb_font-20">Administra tus cerraduras electrónicas de una forma sencilla y eficaz</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-checkmark-outline pb_icon-gradient"></i></div>
              
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Accesos fiables</h3>
                <p class="text-sans-serif pb_font-16">Gestionar el acceso de trabajadores domésticos</p>
              </div>
            </div>
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-happy-outline pb_icon-gradient"></i></div>
              
              <div class="media-body">
                
                <h3 class="mt-2 mb-2 heading">Olvidate de perder las llaves</h3>
                <p class="text-sans-serif pb_font-16">Perder las llaves deja de ser un problema, elimina tu llave perdida y genera una nueva.</p>
              </div>
            </div>
            
          </div>
          <div class="col-lg">
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-key pb_icon-gradient"></i></div>
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Un dispositivo único</h3>
                <p class="text-sans-serif pb_font-16">Lleva cuantas llaves quieras en un mismo dispositivo USB.</p>
              </div>
            </div>
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-home pb_icon-gradient"></i></div>
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Alquila una vivienda</h3>
                <p class="text-sans-serif pb_font-16">Crea y elimina llaves para tus inquilinos sin preocupaciones.</p>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<!-- END section -->

<section class="pb_section bg-light pb_slant-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 order-2">
        <img src="{{asset('assets/img/empresa.png')}}" alt="Image placeholder" class="img-fluid">
      </div>
      <div class="col-lg-8 pr-md-5 pr-sm-0 order-1  mb-5">
        <div class="row">
          <div class="col">
            <h2>Para empresas</h2>
            <p class="pb_font-20">Administra, crea y elimina tus llaves de forma sencilla y rápida</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-bookmarks-outline pb_icon-gradient"></i></div>
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Administra permisos</h3>
                <p class="text-sans-serif pb_font-16">Maneja los permisos de accesos de los empleados.</p>
                
              </div>
            </div>
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-infinite-outline pb_icon-gradient"></i></div>
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Cerraduras y llaves ilimitadas</h3>
                <p class="text-sans-serif pb_font-16">Amplia tu infraestructura gracias a la escalabilidad de este sistema.</p>
                
              </div>
            </div>
            
          </div>
          {{-- <div class="col-lg">
            
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-clock-outline pb_icon-gradient"></i></div>
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Establece horarios</h3>
                <p class="text-sans-serif pb_font-16">Controla y limita el acceso de los empleados a zonas y a sistemas.</p>
                
              </div>
            </div>
            <div class="media pb_feature-v2 text-left mb-1 mt-5">
              <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-clock-outline pb_icon-gradient"></i></div>
              <div class="media-body">
                <h3 class="mt-2 mb-2 heading">Gestión sencilla</h3>
                <p class="text-sans-serif pb_font-16">Controla y limita el acceso de los empleados a zonas y a sistemas.</p>
                
              </div>
            </div>
            
            
            
          </div> --}}
        </div>
        
      </div>
    </div>
  </div>
  
</section>
<!-- END section -->



<section class="pb_section pb_slant-light pb_pb-220" id="section-contact">
  <div class="container">
    <div>
      <section>
        <div>
          <div class="row" >
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <div>
                    <h2>CONTÁCTANOS</h2>
                  </div>
                  <form action="{{ route('form.insert')}}" method="post" data-form-title="CONTACTANOS">
                    @csrf
                    <input type="hidden" data-form-email="true">
                    <div class="form-group">
                      <input type="text" class="form-control {{ $errors->has('name') ? 'alert-danger':''}}" name="name" required="" placeholder="Nombre*" data-form-field="Name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control {{ $errors->has('email') ? 'alert-danger':''}}" name="email" required=""  placeholder="Email*" data-form-field="Email" value="{{old('email')}}">
                    </div>
                    <div >
                      {{-- <input type="text" class="form-control {{ $errors->has('message') ? 'alert-danger':''}}" name="message" required="" placeholder="Mensaje*" rows="7" data-form-field="Message" value="{{old('message')}}"> --}}
                      <textarea class="form-control {{ $errors->has('message') ? 'alert-danger':''}}" name="message" required="" placeholder="Mensaje*" id="txtBox" rows="7" data-form-field="Message"  value="{{old('message')}}"></textarea>
                      <button type="submit" class="btn btn-lg btn-primary">CONTÁCTANOS</button>
                    </div>
                  </form>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                  <img src="{{asset('assets/img/sobre.png')}}" alt="Image placeholder" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
  </section>
  <!-- END section -->
  
  <section class="pb_section bg-light pb_slant-white" id="section-pricing">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center mb-5">
          <h2>Precios</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="pb_pricing_v1 p-5 border border-primary text-center bg-white">
            <h3>Empezando desde</h3>
            <span class="price"><sup>€</sup>0<span></span></span>
            <p class="pb_font-15">Utiliza nuestra plataforma de forma gratuita</p>
            <p class="mb-0"><a href="#" role="button" class="btn btn-primary btn-shadow-blue" data-toggle="modal" data-target="#price-modal">Saber más</a></p>
          </div>
        </div>
        <!--
          <div class="col-md">
            <div class="pb_pricing_v1 p-5 border border-primary text-center bg-white">
              <h3>Premium</h3>
              <span class="price"><sup>€</sup>19</span>
              <p class="pb_font-15">Compra tu cerradura aqui</p>
              <p class="mb-0"><a href="#" role="button" class="btn btn-primary btn-shadow-blue">Ver vendedores</a></p>
            </div>
          </div>
        -->
      </div>
    </div>
  </section>
  
  <!-- Modal Precios -->
  
  <div class="modal fade bd-example-modal-lg" id="price-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Precios</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="height-90 pb_pricing_v1 p-5 border border-primary text-center bg-white">
                <h3>Free</h3>
                <span class="price">0<sub>€</sub></span>
                <ul style="text-align: left">
                  <li>Registra las cerraduras que quieras!</li>
                  <li>Controla quien accede.</li>
                  <li>Crea hasta 2 llaves por cerradura.</li>
                </ul>
                <!--  <p class="mb-0"><a href="#" role="button" class="btn btn-primary btn-shadow-blue">Ver vendedores</a></p> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="height-90 pb_pricing_v1 p-5 border border-primary text-center bg-white">
                <h3>Premium</h3>
                <span class="price">19<sub>€</sub></span>
                <ul style="text-align: left">
                  <li>Registra cerraduras ilimitadas!</li>
                  <li>Crea llaves ilimitadas!</li>
                  {{-- <li>Establece horarios a las llaves.</li> --}}
                  {{-- <li>Recibe avisos por email.</li> --}}
                </ul>
                <!-- <p class="mb-0"><a href="#" role="button" class="btn btn-primary btn-shadow-blue">Ver vendedores</a></p>  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- ENDs section -->
  
  <section class="pb_section pb_slant-white" id="section-faq">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center mb-5">
          <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>FAQ</strong></h5>
          <h2>Preguntas Frecuentes</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div id="pb_faq" class="pb_accordion" data-children=".item">
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq1" aria-expanded="true" aria-controls="pb_faq1" class="pb_font-22 py-4">¿Es seguro?</a>
              <div id="pb_faq1" class="collapse show" role="tabpanel">
                <div class="py-3">
                  <p>Sí, ya que el sistema de llaves funciona con claves cifradas, únicas, e independientes que permiten el acceso a la cerradura.</p>
                  
                </div>
              </div>
            </div>
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq2" aria-expanded="false" aria-controls="pb_faq2" class="pb_font-22 py-4">¿Está disponible en mi país?</a>
              <div id="pb_faq2" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>Actualmente nuestro producto esta disponible únicamente en España.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq3" aria-expanded="false" aria-controls="pb_faq3" class="pb_font-22 py-4">¿Porque utilizar este sistema?</a>
              <div id="pb_faq3" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>Este sistema es un sistema seguro, práctico, sencillo y económico. Hoy en día cualquier persona tiene acceso a un USB, en el que podrá guardar tantas llaves como quiera, además nuestra página web ofrece una interfaz sencilla y  explicaciones claras  de su funcionamiento.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq4" aria-expanded="false" aria-controls="pb_faq4" class="pb_font-22 py-4">¿Es rentable?</a>
              <div id="pb_faq4" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p> Sí, ya que este sistema te permite realizar copias de las llaves sin ningún coste adicional, además del bajo coste que supone adquirir un USB.</p>
                </div>
              </div>
            </div>
            
            <div class="item">
              <a data-toggle="collapse" data-parent="#pb_faq" href="#pb_faq5" aria-expanded="false" aria-controls="pb_faq5" class="pb_font-22 py-4">¿Que pasa si no me funciona la llave/cerradura?</a>
              <div id="pb_faq5" class="collapse" role="tabpanel">
                <div class="py-3">
                  <p>
                    Si tiene cualquier problema puede contactar con nuestro servicio al cliente:
                    <p>
                      Mediante correo electrónico enviando un mensaje a:
                      <br>
                      <a>locksek@support.com</a>
                    </p>
                  </p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  
  @stop
  @section('loader')
  <!-- <div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#1d82ff"/></svg></div> -->
  
  @stop
  