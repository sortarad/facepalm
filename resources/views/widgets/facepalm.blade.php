<div class="card p-0">
	<div class="p-2">
		<h2>icanhazdadjoke</h2>
	</div>
	@if ( $joke )
	<p class="px-2 pb-2 text-base">{{ $joke['joke'] }}</p>
	@endif
</div>
