<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{url(pare_url_file(\Auth::user()->avatar,'user'))}}">
    <meta name="title" content="{{ \Auth::user()->c_name}}">
    <meta name="description" content="Website kết nối mọi người với nhau , cùng nhau chia sẻ những khoảnh khắc đáng nhớ">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">
    <title>{{ __('translate.'.$title) ?? 'Instagram'}}</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/direct.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/reponsive.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/explore.css') }}"> 
      <script src="https://use.fontawesome.com/452826394c.js"></script>
    <link rel="stylesheet" href="{{ asset('css/home-page.css') }}"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> 
    @if(session('toastr'))
        <script>    
            var TYPE_MESSAGE="{{session('toastr.type') }}";
            var MESSAGE ="{{session('toastr.messages') }}";
        
        </script>
        
    @endif
    
</head>
@php
   $home="img/home.png";
   $direct="img/direct.png";
   $explore="img/explore.png"; 
   if($title=='Khám phá') $explore="img/explore-active.png";
   elseif($title=='Message' ||$title=='Chat') $direct="img/direct-active.png"; 
   else  $home="img/home-active.png";
@endphp
<div class="loader hidden ">
<div class="loading-first"></div>
</div>  
<div id="app">
<header> 
      <div class="container">
         <div class="d-grid">
            <div><a href="{{ url('/')}}"><img src="{{ asset('img/logo.png') }}"  width="103px" height="29px"></a></div>
            <div>
               <input type="text" name="search" id="input-search" class="input-search" placeholder="{{ __('translate.Search')}}">
               <a>
               <img src="{{ asset('img/search.png') }}" class="w-15 yes search-2 "></a> 
               <a>
               <img src="{{ asset('img/delete.png') }}" class="w-15 float-right delete"></a>    
            </div>
            <div>
               <div class="d-block">
                  <ul>
                     <li class="d-inline-block  position-relative">
                        <a href="/">
                        <img class="mr-20 rounded-circle w-30" src="{{ asset($home) }}" >
                        </a>
                     </li>
                     
                     <script>
                        $(function(){
                        
                           $('.set-user').on('click',function(){
                              $('.set-user-width').toggleClass("d-none");
                           })
                           
                        })
                    </script>
                     <li class="d-inline-block position-relative set-user">
                        <a> 
                        <img src="{{ pare_url_file(auth()->user()->avatar,'user') }}" class="mr-20 rounded-circle w-30 avatar_user_uploaded" style="object-fit:cover">
                        </a>
                        <ul class="notification set-user-width d-none">
                           
                           <a href="{{ route('get.logout') }}" >
                              <li>{{ __('translate.Log Out')}}</li>
                           </a>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </header>
   @yield('content')
</div>
</html> 
<script src="{{ asset('js/post.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://use.fontawesome.com/452826394c.js"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>

<script>
      if(typeof TYPE_MESSAGE != "undefined"){
          switch (TYPE_MESSAGE){
              case 'success':
                  toastr.success(MESSAGE)
                  break;
              case 'error':
                  toastr.error(MESSAGE)
                  break;
          }
      }
   </script>
