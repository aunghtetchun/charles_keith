import Swal from 'sweetalert2/dist/sweetalert2.js';

window.bootstrap = require("bootstrap");


//sidebar current link
let sidebarLinks = document.querySelectorAll(".sidebar .list-group-item-action");
sidebarLinks.forEach(sidebarLink=>{
    if(sidebarLink.href === location.href) sidebarLink.classList.add('active')
})


window.showToast = function (title="Successful",icon="success"){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon,
        title
    })
}
