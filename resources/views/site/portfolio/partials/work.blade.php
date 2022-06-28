    <article class=" d-flex  p-0 col-12 {{ $index%2 == 0 ? 'justify-content-end' : 'justify-content-start'}} work">
      <div class=" bg-white work-wrapper p-5   d-flex flex-column flex-md-row align-items-md-center
	{{ $index%2 == 0 ? 'flex-md-row-reverse' : ''}} ">
      <div class="border cont-work-img">
        <div class="wrapper-work-img">
	      @foreach($images as $image)
                @if( MyHelpers::typeFile($image->name ) === 'image'  )
                <img class='work-img media-responsive ' src="{{asset('images/works/'.$image->name)}}" alt="">
                @elseif( MyHelpers::typeFile($image->name)=== 'video' )
                    @component('site.portfolio.partials._work-video',['class' => 'work-img media-responsive'])
                        @slot('src',$image->name)
                    @endcomponent
                @endif
                
        @endforeach
        </div>
      </div> 
      <div class="col-12 col-md-6 work-info d-flex align-items-start
          {{ $index%2 == 0 ? 'justify-content-end' : 'justify-content-start'}}"
      >
        <div class="work-info-wrapper p-3 mt-4 ">
           <div class='m-2  work-info-title '>
                <h3 class=' d-inline-block title '>{{$title }}</h3>
                <span class="ml-3 d-inline-block line"></span>
            </div>  
            <div>
              <h3 class='pl-4 mb-3'><span class="bg-dark d-inline-block text-white p-2">{{$work_category}}</span></h3>
            </div>
            <div class="pl-3  work-info-techs">
              @foreach($tt as $techs_tool)
                <span class='mr-1 mt-1 mb-1 badge badge-tech'> 
                  @php $tool_name = $techs_tool->tool->tool_name;
                    $tool_name = ( $tool_name === "N/A") ? "" : " / ".$tool_name ;
                  @endphp
                  {!! $techs_tool->technology->technology_name. $tool_name  !!}
                </span>
              @endforeach 
          </div>
        </div>
      </div>
      </div>  

    </article>
