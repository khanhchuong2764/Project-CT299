const showalert =document.querySelector("[show-alert]");
if (showalert) {
    const closeAlert =showalert.querySelector("[alert-close]");
    closeAlert.addEventListener("click", () => {
        showalert.classList.add('alert-hidden');
    })
    setTimeout(() => {
        showalert.classList.add('alert-hidden');
    },5000);
}

document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(event) {
        if (this.getAttribute('href') !== "#") {
            window.location.href = this.getAttribute('href');
        } else {
            // Ngừng sự kiện click để không điều hướng khi bạn click vào phần không phải chữ
            event.preventDefault();
        }
    });
}); 






