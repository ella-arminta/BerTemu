$(document).ready(function(){
    console.log('hai')
})
function submitEmail(){
    var isemail = $('.inputan #email').val();
    $('.myloader').addClass('show')
    if(isemail != ''){
        // send email kasih otp
        $.ajax({
            type: "POST",
            url: "api/sendOTP.php",
            data: {
                email :isemail
            },
            success: function (response) {
                $('.myloader').removeClass('show');
                if(response == 'kosong'){
                    alert('Silahkan isi email')
                }else if(response == 'gagal email'){
                    alert("Gagal mengirimkan OTP ke email tersebut")
                }else if(response == 'success'){
                    var htmlOtp = `
                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP</label>
                            <input type="text" id="otp" name="otp" class="form-control" required placeholder="123456">
                            <div id="otpHelp" class="form-text">Silahkan gunakan OTP yang telah dikirimkan ke `+isemail+`. OTP berlaku selama 20 menit</div>
                        </div>
                    `;
                    $('.inputan').html(htmlOtp);
                    $('.modal-footer .btn-submit').attr('onclick','verifikasiOTP()');
                    $('.modal-footer .btn-submit').text('Verify OTP');
                    
                }else{
                    alert("Something went wrong")
                }
            }
        });
    }else{
        $('.myloader').removeClass('show')
        alert('Silahkan isi email.')
    }
}
function verifikasiOTP(){
    $('.myloader').addClass('show')
    var thisotp = $('.inputan #otp').val();
    if(thisotp != ''){
        $.ajax({
            type: "POST",
            url: "api/verifyOTP.php",
            data: {
                myotp :thisotp,
            },
            success: function (response) {
                $('.myloader').removeClass('show')
                if(response == 'salah'){
                    alert("OTP yang berikan salah. Silahkan ulangi lagi");
                }else if(response == 'verified'){
                    $.ajax({
                        type: "POST",
                        url: "api/addSubscriber.php",
                        success: function (response) {
                            if(response == 'success'){
                                alert("Email BERHASIL disimpan !. Kami akan mengirimkan notifikasi berita terbaru tentang orang hilang ke email tersebut. Terima Kasih karena sudah membantu Keluarga BerTemu");
                                location.reload();
                            }
                        }
                    });
                }else{
                    alert("Something went wrong when verifying")
                }
            }
        });
    }else{
        $('.myloader').removeClass('show')
        alert("Silahkan isi OTP sesuai dengan yang telah dikirimkan ke email sebelumnya")
    }
}