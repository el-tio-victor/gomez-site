
    {!! Form::label("$name","$label",['class'=>'col text-right']) !!}
    <div class="col-8">

        @if($tag == 'password')
            {!! Form::$tag("$name",['class'=>'form-control', 'placeholder'=>"$placeholder", $required]) !!}

            @else
            {!! Form::$tag("$name",$data,['class'=>'form-control', 'placeholder'=>"$placeholder", $required]) !!}
        @endif
         
                  
    </div>  
    
