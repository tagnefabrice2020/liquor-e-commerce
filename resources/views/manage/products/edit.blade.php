@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
  <div class="card mx-auto" style="max-width:620px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
    <header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600">MODIFIER LE PRODUIT</h4></header>
     <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @include('_partials._message')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>marque commerciale</label>
              <select class="form-control" name="brand_id">
                @foreach(\App\Brand::all() as $brand)
                  <option value='{{$brand->id}}'  @if($brand->id == $product->brand_id) selected @endif>{{$brand->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Nom du produit</label>
              <input name="name" class="form-control" value="{{$product->name}}" placeholder="category name" type="text">
              @if ($errors->has('name')) <small class="form-text text-muted error">{{ $errors->first('name') }}</small> 
              @endif
            </div> <!-- form-group// -->
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>catégorie de produit</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                  <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                @endforeach
              </select>
              @if ($errors->has('category_id')) <small class="form-text text-muted error">{{ $errors->first('category_id') }}</small> @endif
            </div>
            <div class="form-group col-md-4">
                 <label>Prix</label>
                 <input name="price" value="{{$product->price}}" class="form-control" placeholder="price" type="number">
               @if ($errors->has('price')) <small class="form-text text-muted error">{{ $errors->first('price') }}</small> @endif
               </div> 
               <div class="form-group col-md-4">
                    <label>Volume du produit</label>
                    <select class="form-control" name="volume_id">
                         @foreach($volumes as $volume)
                              <option value="{{$volume->id}}"@if($product->volume_id == $volume->id) selected @endif>{{$volume->quantity}}</option>
                         @endforeach
                    </select>
                    @if ($errors->has('volume_id')) <small class="form-text text-muted error">{{ $errors->first('volume_id') }}</small> @endif
               </div>
              
            
          </div>
      
          <div class="form-row">
           <div class="form-group col-md-6">
               <label>Product Slug</label>
                 <input type="text" name="slug" class="form-control" placeholder="example 33xport-beer-1L" value="{{$product->slug}}">
                    @if ($errors->has('slug')) <small class="form-text text-muted error">{{ $errors->first('slug') }}</small> @endif
                 @if ($errors->has('status')) <small class="form-text text-muted error">{{ $errors->first('status') }}</small> @endif
               </div> 
               <div class="form-group col-md-6">
                 <label>Status</label>
                 <select id="inputState" class="form-control" name="status">
                         <option value="1" @if($product->status == 1) selected @endif>active</option>
                         <option value="0" @if($product->status == 0) selected @endif>inactive</option>
                 </select>
                 @if ($errors->has('status')) <small class="form-text text-muted error">{{ $errors->first('status') }}</small> @endif
               </div> 
               
    </div>
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{$product->description}}</textarea>
         @if ($errors->has('description')) <small class="form-text text-muted error">{{ $errors->first('description') }}</small> @endif
      </div>
      <div class="form-group">
        <label>Image du produit</label>
        <input type="file" name="image_url" class="form-control">
        @if ($errors->has('image_url')) <small class="form-text text-muted error">{{ $errors->first('image_url') }}</small> @endif
      </div>
     
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-block"> modifier <i class="fa fa-save"></i>  </button>
          </div> <!-- form-group// -->    
      </form>
    </article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection