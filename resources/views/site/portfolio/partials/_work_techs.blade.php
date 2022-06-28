<div class="col-12 col-sm-8 col-md-3 work-techs ">
    <h3>Tecnologías</h3>
    <ul>
    @foreach($work_techs as $tech)
	@php
		$tool_name = $tech->tool->tool_name;
		$tool_name = ($tool_name === "N/A") ? '' : $tool_name ;
	@endphp 
	<li>
		<strong class=' badge badge-pill bg-naranja'>
		{{$tech->technology->technology_name}}&nbsp;/&nbsp;{{$tool_name}}
		</strong>
	</li>
    @endforeach
    </ul>
</div>
