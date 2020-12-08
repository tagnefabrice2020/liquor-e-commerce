@include('manage._partials.header')
 <body class="sb-nav-fixed">
 	@include('manage._partials.nav')
 	<div id="layoutSidenav">
 		@include('manage._partials.sidenav')
 	 <div id="layoutSidenav_content">
 	 	@yield('manage-content')
 	 	
 	 	   </div>
        </div>
        @yield('scripts')
        <script type="text/javascript">
      	var nav = new Vue({
      		el: '#nav-section',
      		data: {
      			notifications: [],
            authId: <?php echo Auth::id(); ?>
      		},
      		updated() {
      			this.newNotification()
      		},
      		mounted() {
      			this.notification()
      		},
      		methods: {
      			async notification () {
      				await axios.get('http://<?php echo Request::getHost(); ?>:8000/getNotifications')
      					.then((response) => {
      						this.notifications = response.data
      						// console.log(this.notifications[0].id)
      					}).catch(function (e){
                            console.log(e)
                        })
      			},

      			newNotification () {
      				Echo.channel('App.User.'+this.authId)
                .notification((notification) => {
                  this.notifications.unshift(notification)
                });
                this.notification()
      			}
      		}
      	})
      </script>
        @livewireScripts
      @include('manage._partials.footer_script')

   