<div class="row">
   <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">{{$title}}</a></li>
               @if(isset($supTitle))
               <li class="breadcrumb-item active">{{ $supTitle}}</li>
               @endif
            </ol>
         </div>
      </div>
   </div>
</div>
