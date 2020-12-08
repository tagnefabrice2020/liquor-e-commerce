
<!DOCTYPE HTML>
<html lang="en">
	@include('_partials.header')
	@yield('css')
<body>
	


<header class="section-header" id="search">
	@include('_partials.navbar')
	{{-- @livewire('search-dropdown') --}}
	@if(Route::currentRouteName() != 'register' && Route::currentRouteName() != 'login') 
		@include('_partials.search')
	@endif
</header> <!-- section-header.// -->


@include('_partials.mobile-nav')

<div id="app">

@yield('content')
{{-- @yield('scripts') --}}
@include('_partials.footer')


</div>

{{-- @yield('searchScripts') --}}
@yield('scripts')
<script type="text/javascript">
	var search = new Vue({
		el: '#search',
		data: {
			search: '',
			address: '',
			searchResultsVisible: false,
			searchResults: {},
			lang: '<?php echo app()->getLocale(); ?>'
		},
		methods: {
			async instantSearch (event) {
				if(event.target.id == 'address_option') {
					this.address = event.target.value
				}
				if(this.search.length > 2 && this.address != '') {
					var data = await axios
      				.get('http://127.0.0.1:8000/api/search',
      					{params: { search: this.search, address: this.address }})
      				.then(response => (this.searchResults = response.data))
      				.catch(error => console.log(error))

					// console.log(this.searchResults)
				} else if(this.search.length <= 1) {
					this.searchResults = {}
				}
			},

			close (event) {
				// console.log(event.target)
				this.searchResultsVisible = false;
				
			}
		}
	})
</script>

{{-- @livewireScripts --}}
</body>
</html>