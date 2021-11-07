$('.skin-square input').iCheck({
    checkboxClass: 'icheckbox_square',
    radioClass: 'iradio_square',
});

$(".select2").select2({
    width: "resolve",
});

$(".monthpicker").datetimepicker({
    format: "MM-YYYY",
});

$(".datepicker").datetimepicker({
    format: "YYYY-MM-DD",
});

$(".datetimepicker").datetimepicker({
    format: "YYYY-MM-DD HH:ss",
});

$('.money').mask("000.000.000.000", {
    reverse: true,
});


$(document).ready(function () {
    setTimeout(() => {
        $(".form-delete").each(function () {
            $(this).on("submit", function (e) {
                var form = this;
                e.preventDefault();
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#303179",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.value) {
                        return form.submit();
                    }
                });
            });
        });
    }, 2000);
});

function replaceDot(text) {
    if (text != 0) {
        return parseFloat(text.replace(/[^0-9]/g, ""));
    } else {
        return 0;
    }
}

let pusher = new Pusher($("#pusher_app_key").val(), {
    cluster: $("#pusher_cluster").val(),
    encrypted: true,
});

let channel = pusher.subscribe("notification");
channel.bind("new_notification", function (data) {
    displayNotification(data.data);
});

function displayNotification(data) {
    var roles = data;
    if (roles.includes(role_name)) {
        if (!("Notification" in window)) {
            alert("Web Notification is not supported");
            return;
        }
        let alert_sound = document.getElementById("chat-alert-sound");
        alert_sound.play();
        Notification.requestPermission((permission) => {
            let notification = new Notification("Pemberitahuan baru!", {
                body: "Lihat pemberitahuan baru anda", // content for the alert
                icon: base_url + "/app-assets/images/logo/logo.png", // optional image url
            });

            // link to page on clicking the notification
            notification.onclick = () => {
                // window.open(window.location.href, '_self');
                // window.focus();
            };
        });
    }
}

function openNotification(id) {
    // alert('You opened notif!');
    $.ajax({
        url: base_url + `/api/read-all-notification`,
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id
        },
        success: function (data) {
            $('#notificationTotal').text(data.unread_notifications);
            $('#notificationTotal').addClass('invisible');
        }
    })
}

function showPassword() {
    let state = $("#password").attr("type");
    if (state == "password") {
        $("#password").attr("type", "text");
        $("#icon-eye").removeClass("ft-eye").addClass("ft-eye-off");
    } else {
        $("#password").attr("type", "password");
        $("#icon-eye").removeClass("ft-eye-off").addClass("ft-eye");
    }
}

$('#mark-button').on('click', function (e) {
    e.stopPropagation();
    markNotification();
});

function markNotification() {
    var val = $('#mark-button').val();

    if (val == 'tandai') {
        $(".media-left input:checkbox").removeClass('invisible').addClass('visible');
        $('#mark-button').text('Cancel');
        $('#mark-button').val('cancel');
        $('#mark-all-button').prop("disabled", false);
    } else {
        $('#mark-button').text('Tandai');
        $('#mark-button').val('tandai');
        $(".media-left input:checkbox").removeClass('visible').addClass('invisible');
    }


}

$('#mark-all-button').on('click', function (e) {
    e.stopPropagation();
    markAllNotification();
});

function markAllNotification() {
    $('.visible').prop('checked', true);
}


$('#mark-as-read-button').on('click', function (e) {
    e.stopPropagation();
    markAsRead();
})

function markAsRead() {
    var datas = []
    $(".media-left input:checked").each(function () {
        datas.push($(this).val());
    });

    $.ajax({
        url: base_url + `/api/mark-notification-as-read`,
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            data: datas
        },
        success: function (res) {}
    })
}

$(document).ready(function () {
    function getNotification() {
        $.ajax({
            url: base_url + "/api/notification",
            type: "get",
            data: {
                user_id: user_id,
            },
            dataType: "JSON",
            success: function (response) {
                if ($('#notificationTotal').length > 0) {
                    console.log('I got the DOM!');
                    var jumlahNotifikasiAwal = $("#notificationTotal").text();
                    var jumlahNotifikasiAkhir = parseInt(jumlahNotifikasiAwal) + parseInt(response.notification_count);
                    $("#notificationTotal").removeClass("invisible").text(jumlahNotifikasiAkhir);
                    response.today_unread_notif.map(function (val, id) {
                        $(val).prependTo(".media-list");
                    });
                } else {
                    let element = `<span class="badge badge-pill badge-default badge-danger badge-default badge-up" id="notificationTotal">
							  ${parseInt(response.notification_count)}
							  </span>`;
                    $(element).appendTo("#notificationLink");
                    response.today_unread_notif.map(function (val, id) {
                        $(val).prependTo(".media-list");
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    }
});




function removeCountNotification() {
    $.ajax({
        url: base_url + "/api/read-notification",
        data: {
            _token: $("meta[name='token']").attr("content"),
        },
        method: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response.message);
            $('#notificationTotal').text(0);
        },
        error: function (err) {
            console.log(err);
        },
    });
}

function hideLoader() {
    setTimeout(() => {
        $('#loader-page').addClass('loader-loaded');

        $('body').css('overflow', 'unset');
        $('.app-content').removeClass('overflow-hidden');
    }, 1000);

}


function showPassword() {
    let state = $('#password').attr('type');
    if (state == 'password') {
        $('#password').attr('type', 'text');
        $('#icon-eye').removeClass('ft-eye').addClass('ft-eye-off');
    } else {
        $('#password').attr('type', 'password');
        $('#icon-eye').removeClass('ft-eye-off').addClass('ft-eye');
    }
}

function showDeleteConfirm(id) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak akan dapat mengembalikan ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#303179',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.value) {
            return document.getElementById('delete-form' + id).submit();
        }
    });
}

function rp(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}
