 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('theme/client/img/breadcrumb.jpg')}}">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>@yield('title')</h2>
                     <div class="breadcrumb__option">
                         <a href="{{ route('index') }}">Home</a>
                         <span>@yield('title')</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Section End -->
