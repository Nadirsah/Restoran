 
     <div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background:linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)),url('{{ asset($navbar->background_file_path) }}');">
         <div class="container my-5 py-5">
             <div class="row align-items-center g-5">
                 <div class="col-lg-6 text-center text-lg-start">
                     <h1 class="display-3 text-white animated slideInLeft">{{$navbar->title}}</h1>
                     <p class="text-white animated slideInLeft mb-4 pb-2">{{$navbar->text}}</p>
                     
                 </div>
                 <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                     <img class="img-fluid" src="{{$navbar->image_file_path}}" alt="">
                 </div>
             </div>
         </div>
     </div>