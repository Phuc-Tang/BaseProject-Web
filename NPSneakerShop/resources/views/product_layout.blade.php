@extends('welcome')
@section('content')
<main>
  @include('layout.banner')
  @include('layout.nav')

    <div class="container-fluid d-md-flex align-items-stretch">
      <!-- Page Content  -->

      @include('layout.sidebar')

      @yield('product_content')

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        {{-- {!! $all_product->render() !!} --}}
      </ul>
    </nav>
  </main>
@endsection