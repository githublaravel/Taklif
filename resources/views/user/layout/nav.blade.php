<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div class="container">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
 </button>
 
 <a href="#" class="navbar-brand"><h3>ShopBrand</h3></a>
 <div class="collapse navbar-collapse" id="mainNav">
  <ul class="navbar-nav ml-auto nav-fill">
   
   <li class="nav-item px-4 active">
    <a href="/home" class="nav-link"><h5>Home</h5></a>
   </li>
   
   <li class="nav-item px-4 dropdown ">
    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
     <div class="d-md-flex align-items-start justify-content-start">
      <div>
       <div class="dropdown-header" style="text-align:center">Categories</div>
       @foreach($cats as $cat)
       <a class="dropdown-item" href="/products/{{$cat->id}}" style="text-align:center"><h6>{{$cat->name}}</h6></a>
       @endforeach
      </div>
     </div>
    </div>
   </li>
   <li class="nav-item px-4">
    <a href="/products" class="nav-link">Products</a>
   </li>
  </ul>
 </div>
</div>
</nav>