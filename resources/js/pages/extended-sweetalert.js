import Swal from 'sweetalert2';

//Basic
if (document.getElementById("sweetalert-basic"))
    document.getElementById("sweetalert-basic").addEventListener("click", function () {
        Swal.fire({
            title: 'Any fool can use a computer',
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            showCloseButton: false
        })
    });

//A title with a text under
if (document.getElementById("sweetalert-title"))
    document.getElementById("sweetalert-title").addEventListener("click", function () {
        Swal.fire({
            title: "The Internet?",
            text: 'That thing is still around?',
            icon: 'question',
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            showCloseButton: false
        })
    });

//Success Message
if (document.getElementById("sweetalert-success"))
    document.getElementById("sweetalert-success").addEventListener("click", function () {
        Swal.fire({
            title: 'Harika!',
            text: 'İşlem başarıyla gerçekleşti!',
            icon: 'success',
            timer: 1300,
            showConfirmButton: false,
            showCancelButton: false,
            showCloseButton: false,
            timerProgressBar: true
        })
    });

//error Message
if (document.getElementById("sweetalert-error"))
    document.getElementById("sweetalert-error").addEventListener("click", function () {
        Swal.fire({
            title: 'Oops...',
            text: 'Something went wrong!',
            icon: 'error',
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            footer: '<a href="">Why do I have this issue?</a>',
            showCloseButton: false
        })
    });


//info Message
if (document.getElementById("sweetalert-info"))
    document.getElementById("sweetalert-info").addEventListener("click", function () {
        Swal.fire({
            title: 'Oops...',
            text: 'Something went wrong!',
            icon: 'info',
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            footer: '<a href="">Why do I have this issue?</a>',
            showCloseButton: false
        })
    });

//Warning Message
if (document.getElementById("sweetalert-warning"))
    document.getElementById("sweetalert-warning").addEventListener("click", function () {
        Swal.fire({
            title: 'Oops...',
            text: 'Something went wrong!',
            icon: 'warning',
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            footer: '<a href="">Why do I have this issue?</a>',
            showCloseButton: false
        })
    });

// long content
if (document.getElementById("sweetalert-longcontent"))
    document.getElementById("sweetalert-longcontent").addEventListener("click", function () {
        Swal.fire({
            imageUrl: 'https://placeholder.pics/svg/300x1500',
            imageHeight: 1500,
            imageAlt: 'A tall image',
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            showCloseButton: false
        })
    });

// Livewire olaylarını dinle
document.addEventListener('livewire:initialized', () => {
    Livewire.on('swal:success', (event) => {
        Swal.fire({
            title: event[0].title,
            text: event[0].text,
            icon: event[0].icon,
            customClass: {
                confirmButton: 'btn bg-primary text-white w-xs mt-2'
            },
            buttonsStyling: false
        });
    });

    Livewire.on('swal:error', (event) => {
        Swal.fire({
            title: event[0].title,
            text: event[0].text,
            icon: event[0].icon,
            customClass: {
                confirmButton: 'btn bg-primary text-white w-xs mt-2'
            },
            buttonsStyling: false
        });
    });
});

document.addEventListener("click", async function (e) {
    const button = e.target.closest(".sweetalert-params");
    if (!button) return;

    const itemId = button.getAttribute("data-id");
    if (!itemId) {
        Swal.fire({
            title: 'Hata!',
            text: 'Silinecek kayıt bulunamadı.',
            icon: 'error',
            customClass: {
                confirmButton: 'btn bg-primary text-white w-xs mt-2'
            },
            buttonsStyling: false
        });
        return;
    }

    const result = await Swal.fire({
        title: 'Silmek İstediğine Emin misin?', 
        text: "Bu işlemi geri alamazsın!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Evet, Sil!',
        cancelButtonText: 'Hayır, Silme!',
        customClass: {
            confirmButton: 'btn bg-primary text-white w-xs me-2 mt-2',
            cancelButton: 'btn bg-danger text-white w-xs mt-2'
        },
        buttonsStyling: false,
        showCloseButton: false
    });

    if (result.isConfirmed) {
        try {
            // Livewire component'ine destroy metodunu çağır
            await Livewire.dispatch('destroy', { id: itemId });
        } catch (error) {
            console.error('Silme işlemi başarısız:', error);
            Swal.fire({
                title: 'Hata!',
                text: 'Kayıt silinirken bir hata oluştu. Lütfen tekrar deneyin.',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn bg-primary text-white w-xs mt-2'
                },
                buttonsStyling: false
            });
        }
    }
});






//Custom Image
if (document.getElementById("sweetalert-image"))
    document.getElementById("sweetalert-image").addEventListener("click", function () {
        Swal.fire({
            title: 'Sweet!',
            text: 'Modal with a custom image.',
            imageUrl: '/images/logo-sm.png',
            imageHeight: 40,
            confirmButtonClass: 'btn bg-primary text-white w-xs mt-2',
            buttonsStyling: false,
            animation: false,
            showCloseButton: false
        })
    });
