const Toast = Swal.mixin({
				  toast: true,
				  position: 'top',
				  iconColor: 'white',
				  customClass: {
				    popup: 'colored-toast',
				  },
				  showConfirmButton: false,
				  timer: 2000,
				  timerProgressBar: true,
			});

			 async function showMsgWarningToasts(msg){
			 	await Toast.fire({
				    icon: 'warning',
				    title: `field ${msg} required!`,
				  })
			}
			async function showMsgSuccessToasts(msg){
				await Toast.fire({
				    icon: 'success',
				    title: msg,
				  })
			}

			function showMsg(msg){
				Swal.fire({
				  position: "top",
				  title: "Warrning",
				  text: `The field ${msg} is required!`,
				  icon: "warning",
				  timer: 2000
				});
			}