@extends('layouts.app')

@section('content')
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="carousel/1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="carousel/2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="carousel/3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container">
    <section id="about" class="mt-5 bg-white">
      <div class="row">
        <h1 class="mb-5 text-center">About</h1>
        <div class="col-md-6">
          <img src="logo/logo.png" alt="" class="ms-5 mt-4">
        </div>
        <div class="col-md-6">
          <h1>Reservasi Restoran</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit doloremque assumenda vel quibusdam
            voluptatem laborum quos corrupti ex libero minus qui obcaecati perspiciatis praesentium impedit, debitis
            labore quisquam, aliquid beatae necessitatibus. Voluptate incidunt fugiat eaque minus doloribus assumenda
            ratione nemo ullam aliquam consectetur? Molestiae fuga dolorum enim! Optio, expedita debitis vitae odio
            consectetur porro temporibus soluta repellendus, nisi dolores dignissimos ratione nobis illum modi tenetur cum
            facere nostrum deleniti, sunt corrupti sit. Eos nisi inventore ab quo saepe vel veritatis ullam, esse impedit
            a hic! Sed iste voluptate sint possimus voluptatem. Reprehenderit eius repudiandae nulla nihil vel itaque,
            atque illo!</p>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium illo maxime ratione necessitatibus quos
            molestias! Assumenda molestiae eveniet eius accusamus accusantium voluptates veritatis, nam eos aspernatur
            repellat tenetur necessitatibus beatae a esse eligendi saepe blanditiis neque! Dicta eum veritatis natus
            consectetur neque. Fugiat veritatis vel minima harum, dolore id nisi laborum veniam incidunt, quisquam fuga.
            Fugiat ea, possimus vero esse quis, quo mollitia doloribus eum blanditiis amet voluptatibus ad porro? Neque
            atque autem, voluptatibus eos fugit nesciunt! Reprehenderit ab, tempore voluptate, distinctio laborum amet
            natus autem esse commodi aliquam laudantium. Perspiciatis obcaecati ullam molestiae natus laborum qui iusto
            labore accusantium!</p>
        </div>
      </div>
    </section>

    <section id="menu" class="mt-5 bg-white">
      <div class="row">
        <h1 class="mb-5 text-center">Menu</h1>
        @foreach ($menu as $menus)
          <div class="col-md-4">
            <div class="card mt-5" style="width: 18rem;">
              <img src="{{ Storage::url($menus->image) }}" class="card-img-top" alt="{{ $menus->name }}" width="280"
                height="280">
              <div class="card-body">
                <h5 class="card-text">Food Name : {{ $menus->name }}</h5>
                <p class="card-text">Ingredient : {{ $menus->ingredients_name }}</p>
                <p class="card-text">Quantity : {{ $menus->quantity }}</p>
                <p class="card-text">Price : {{ $menus->price }}</p>
                <a href="{{ route('orderi.index') }}" class="btn btn-primary">Order Now</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>


  </div>
@endsection
