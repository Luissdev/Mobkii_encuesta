   @extends('tienda.app')

   @section('content')
   <div class="col-md-9">

    <div class="row">
        @foreach($productos as $producto)
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="{{$producto->imagen}}" alt="" style="width:320px;height:150px;">
                <div class="caption">
                    <h4 class="pull-right">$ {{$producto->precio}}</h4>
                    <h4><a href="#">{{$producto->nombre}}</a>
                    </h4>
                    <p>{{$producto->descripcion}}</p>
                </div>
                <div class="ratings">
                    <p class="pull-right">15 reviews</p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach


    </div>
    {!! $productos->render() !!}
    @endsection