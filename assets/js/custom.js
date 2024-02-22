var items = $("select[default]");
for (var i = 0; i < items.length; i++) {
    $(items[i]).val($(items[i]).attr("default") || 0);
}
window.onload = function(){ 
	SetRela();
	speedModeNotice();
	updateCurrentTime();
}
function RememberMe() {
    var form = document.getElementById('login_td');
    if (!form) {
        return;
    }
    var rememberCheckbox = document.getElementById('login-remember');
    var usernameInput = document.getElementById('taikhoan');
    var passwordInput = document.getElementById('matkhau');
    var savedUsername = getCookie('savedUsername');
    var savedPassword = getCookie('savedPassword');

    if (savedUsername && savedPassword) {
        usernameInput.value = savedUsername;
        passwordInput.value = savedPassword;
        rememberCheckbox.checked = true;
    }

    form.addEventListener('submit', function () {
        if (rememberCheckbox.checked) {
            setCookie('savedUsername', usernameInput.value, 30);
            setCookie('savedPassword', passwordInput.value, 30);
        } else {
            deleteCookie('savedUsername');
            deleteCookie('savedPassword');
        }
    });

    function getCookie(name) {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.indexOf(name + '=') === 0) {
                return cookie.substring(name.length + 1);
            }
        }
        return null;
    }

    function setCookie(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + value + expires + '; path=/';
    }

    function deleteCookie(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    }
}
RememberMe();
var location_url = window.location.href;
var parameter_str = location_url.split('?')[1];
if (parameter_str !== undefined) {
    parameter_str = parameter_str.split('#')[0];
    var $_GET = {};
    var parameter_arr = parameter_str.split('&');
    var tmp_arr;
    for (var i = 0, len = parameter_arr.length; i <= len - 1; i++) {
        tmp_arr = parameter_arr[i].split('=');
        $_GET[tmp_arr[0]] = decodeURIComponent(tmp_arr[1]);
    }
    window.$_GET = $_GET;
} else {
    window.$_GET = [];
}
function searchSubmit(){
	$('#listTable').bootstrapTable('refresh');
	return false;
}
function searchClear(){
	$('#searchToolbar').find('input[name]').each(function() {
		$(this).val('');
	});
	$('#searchToolbar').find('select[name]').each(function() {
		$(this).find('option:first').prop("selected", 'selected');
	});
	$('#listTable').bootstrapTable('refresh');
}
function updateToolbar(){
    $('#searchToolbar').find(':input[name]').each(function() {
		var name = $(this).attr('name');
		if(typeof window.$_GET[name] != 'undefined')
			$(this).val(window.$_GET[name]);
	})
}
function updateQueryStr(obj){
	var arr = [];
    for (var p in obj){
		if (obj.hasOwnProperty(p) && typeof obj[p] != 'undefined' && obj[p] != '') {
			arr.push(p + "=" + encodeURIComponent(obj[p]));
		}
	}
	history.replaceState({}, null, '?'+arr.join("&"));
}
function getCurrentTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var day = now.getDate();
    var month = now.getMonth() + 1; 
    var year = now.getFullYear();
    day = day < 10 ? '0' + day : day;
    month = month < 10 ? '0' + month : month;

    var formattedDate = hours + ':' + minutes + ':' + seconds + ' ' + day + '-' + month + '-' + year;

    return formattedDate;
}

function updateCurrentTime() {
    var currentTimeElement = document.getElementById('current-time');
    if (currentTimeElement) {
        currentTimeElement.textContent = getCurrentTime();
    }
}
setInterval(updateCurrentTime, 1000);
function speedModeNotice(){
    var ua = window.navigator.userAgent;
    if(ua.indexOf('Windows NT')>-1 && ua.indexOf('Trident/')>-1){
        var html = "<div class=\"panel panel-default\"><div class=\"panel-body\">Trình duyệt hiện tại đang ở chế độ tương thích. Để đảm bảo sử dụng bình thường các chức năng nền, vui lòng chuyển sang<b style='color:#51b72f'>Chế độ tốc độ cực cao</b>！<br>Cách thao tác: Click vào biểu tượng IE ở bên phải thanh địa chỉ trình duyệt<b style='color:#51b72f;'><i class='fa fa-internet-explorer fa-fw'></i></b>→Chọn'<b style='color:#51b72f;'><i class='fa fa-flash fa-fw'></i></b><b style='color:#51b72f;'>Chế độ tốc độ cực cao</b>”</div></div>";
        $("#browser-notice").html(html)
    }
}

//		layer.closeAll();
//layer.msg('Lỗi máy chủ');
var isMobile = function(){
	if( /Android|SymbianOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Windows Phone|Midp/i.test(navigator.userAgent)) {
		return true;
	}
	return false;
}
$(document).ready(function () {
    $('#modal_on_off').change(function () {
        if ($(this).val() === 'on') {
            $('.modal').modal('show');
        } else {
            $('.modal').modal('hide');
        }
    });
});
$('#closeModalBtn').click(function () {
	$('.modal').modal('hide');
});
function SetRela() {
    var boyRadio = document.getElementById('set_boyfriend');
    var girlRadio = document.getElementById('set_girlfriend');
    var boyConfig = document.querySelector('.boy-config');
    var girlConfig = document.querySelector('.girl-config');
    var currentRadio = boyRadio;

    if (boyRadio) {
        boyRadio.addEventListener('change', function () {
            if (boyRadio.checked) {
                boyConfig.style.display = 'block';
                girlConfig.style.display = 'none';
                currentRadio = boyRadio;
            } else {
                girlConfig.style.display = 'none';
            }
        });
    }

    if (girlRadio) {
        girlRadio.addEventListener('change', function () {
            if (girlRadio.checked) {
                girlConfig.style.display = 'block';
                boyConfig.style.display = 'none';
                currentRadio = girlRadio;
            } else {
                boyConfig.style.display = 'none';
            }
        });
    }

    if (boyRadio) {
        boyRadio.addEventListener('change', function () {
            if (boyRadio.checked && currentRadio !== boyRadio) {
                boyConfig.style.display = 'block';
                girlConfig.style.display = 'none';
                currentRadio = boyRadio;
            }
        });
    }
}
 // Ajax cmt
 $(document).ready(function() {
	$("#comment-form").submit(function(event) {
		event.preventDefault();
		var hovaten = $("#hovaten").val();
		var taikhoan = $("#taikhoan").val();
		var avatar = $("#avatar").val();
		var noidung = $("#noidung").val();
		var tichxanh = $("#tichxanh").val();
		var role = $("#role").val();
		$.ajax({
			type: "POST",
			url: "ajax/comments.php",
			data: {
				binhluan: 1,
				hovaten: hovaten,
				taikhoan: taikhoan,
				avatar: avatar,
				noidung: noidung,
				tichxanh: tichxanh,
				role: role
			},
			success: function(response) {
				if (response === "success") {
					var closeMsg = Dreamer.loading("Đang tạo bình luận");
					setTimeout(function() {
						closeMsg();
						Dreamer.success(
							"Yêu cầu bình luận của bạn đã được gửi.");
					}, 2000);
				} else {
					Dreamer.error(response);
				}
			},
			error: function(xhr, status, error) {
				Dreamer.error('Đã xảy ra lỗi khi cố bình luận, vui lòng thử lại.');
			}
		});
		return false;
	});
});

// AJAX LOGIN
$(document).ready(function() {
    $("#login_td").submit(function(event) {
        event.preventDefault();
        var submitButton = $("#submit");
        var originalButtonText = submitButton.html(); 
        submitButton.html('<i class="fa fa-spinner fa-spin me-1"></i> Đang kiểm tra...');
        submitButton.prop('disabled', true);

        var taikhoan = $("#taikhoan").val();
        var matkhau = $("#matkhau").val();

        $.ajax({
            type: "POST",
            url: "./ajax/login.php",
            data: {
                dangnhap: 1,
                taikhoan: taikhoan,
                matkhau: matkhau
            },
            success: function(response) {
                if (response === "success") {
					layer.msg("Đăng nhập thành công!", { icon: 1 });
						setTimeout(function(){ window.location.href='http://localhost/love/index.php'; }, 1200);
                } else if (response === "def") {
					layer.msg("Phát hiện tấn công SQL Injector", { icon: 3 });
                    var status_def = "<iframe src='../function/data_config/block_deface.php' style='z-index:9999;position: fixed; width: 100%; height: 100%; top: 0; left: 0; border: none;' allowfullscreen></iframe>";
                    $("body").append(status_def);
                } else {
					layer.msg(response, {
						icon: 5,
						offset: 't',
					  });
					  
                }
                submitButton.html(originalButtonText);
                submitButton.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                Swal.fire("Oops...", "Đã xảy ra lỗi, vui lòng thử lại.", "error");
                submitButton.html(originalButtonText);
                submitButton.prop('disabled', false);
            }
        });
        return false;
    });
});

// ajax set site
$(document).ready(function() {
    $("#setting_save").click(function() {
        var set_bg = $("#set_bg").val();
        var set_mode_love = $("#set_mode_love").val();
        var set_title = $("#set_title").val();
        var set_description = $("#set_description").val();
        var set_logo = $("#set_logo").val();
        var set_keywords = $("#set_keywords").val();
        var set_blackip = $("#set_blackip").val();
        var set_author = $("#set_author").val();
        var set_usercmt = $("#set_usercmt").val();
		var modal_on_off = $("#modal_on_off").val();
		var modal_title = $("#modal_title").val();
		var modal_content = $("#modal_content").val();
        var set_footer = $("#set_footer").val();
        var baotri_site = $("#baotri_site").val();
        var ii = layer.load(2, { shade: [0.1, '#fff'] });

        $.ajax({
            type: "POST",
            url: "../ajax/set_site.php",
            data: {
                setting_save: 1,
                set_bg: set_bg,
                set_mode_love: set_mode_love,
                set_title: set_title,
                set_description: set_description,
                set_logo: set_logo,
                set_keywords: set_keywords,
                set_blackip: set_blackip,
                set_usercmt: set_usercmt,
                set_author: set_author,
				modal_title: modal_title,
				modal_on_off: modal_on_off,
				modal_content: modal_content,
                set_footer: set_footer,
                baotri_site: baotri_site
            },
            success: function(response) {
                layer.close(ii);
                if (response.indexOf('Lưu thông tin thành công') !== -1) {
                    layer.confirm('Thông tin đã được lưu vào hệ thống.', {
                        icon: 1
                    });
                } else {
                    layer.alert(response, { icon: 2 });
                }
            },
            error: function(xhr, status, error) {
                layer.msg('Lỗi máy chủ');
                return false;
            }
        });
    });
});
// set love day you
$(document).ready(function() {
    $("#__td-boy").submit(function(event) {
        event.preventDefault();
        var yourname = $("#yourname").val();
        var avatarboy = $("#avatarboy").val();
        var zodiac = $("#zodiac").val();
        var timelove = $("#timelove").val();
		var titlelove = $("#titlelove").val();
		var ThemeRelaWhiteChecked = $("#theme-rela-white").is(":checked");
		var effect_fall = $("input[name='effect_fall']:checked").val();
		var music = $("#music").val();
		var dataToSend = {
			save_boy: 1,
			yourname: yourname,
			avatarboy: avatarboy,
			zodiac: zodiac,
			timelove: timelove,
			titlelove: titlelove,
			music: music,
			theme_rela_white: ThemeRelaWhiteChecked ? 1 : 0,
			effect_fall: effect_fall
		};
        var ii = layer.load(2, { shade: [0.1, '#fff'] });
        $.ajax({
            type: "POST",
            url: "../ajax/set_loveday.php",
            data: dataToSend,
            success: function(response) {
                layer.close(ii);
                if (response.indexOf('Lưu thông tin thành công') !== -1) {
                    layer.alert(response, {
                        icon: 1,
                        closeBtn: false
                    });
                } else {
                    layer.alert(response, { icon: 2 });
                }
            },
            error: function(xhr, status, error) {
                layer.msg('Lỗi máy chủ');
                return false;
            }
        });
    });
});

// set love day girlfriends
$(document).ready(function() {
    $("#__td-girl").submit(function(event) {
        event.preventDefault();
        var namegirl = $("#namegirl").val();
        var avatargirl = $("#avatargirl").val();
        var zodiacgirl = $("#zodiacgirl").val();
        var ii = layer.load(2, { shade: [0.1, '#fff'] });
        $.ajax({
            type: "POST",
            url: "../ajax/set_loveday.php",
            data: {
                save_girl: 1,
                namegirl: namegirl,
                avatargirl: avatargirl,
                zodiacgirl: zodiacgirl
            },
            success: function(response) {
                layer.close(ii);
                if (response.indexOf('Lưu thông tin thành công') !== -1) {
                    layer.alert(response, {
                        icon: 1,
                        closeBtn: false
                    });
                } else {
                    layer.alert(response, { icon: 2 });
                }
            },
            error: function(xhr, status, error) {
                layer.msg('Lỗi máy chủ');
                return false;
            }
        });
    });
});
//
$('#avatarusers').change(function() {
    if (this.files.length > 0) {
        var file = this.files[0];
        var validImageTypes = ["image/jpeg", "image/png", "image/gif"];
        if (validImageTypes.includes(file.type)) {
            var url = URL.createObjectURL(file);
            $('#avatarimg').attr('src', url);
            $('#newavt').val(url);
        } else {
            alert("Chọn một tệp hình ảnh hợp lệ.");
            // Clear the file input
            $('#avatarusers').val('');
        }
    }
});

// Change profile
$(document).ready(function() {
    $("#td-change-profile").submit(function(event) {
        event.preventDefault();
        var avatarusers = $("#avatarusers").val();
        var nameadmin = $("#nameadmin").val();
        var oldpwd = $("#oldpwd").val();
		var newpwd = $("#newpwd").val();
		var newpwd2 = $("#newpwd2").val();
        var ii = layer.load(2, { shade: [0.1, '#fff'] });
        $.ajax({
            type: "POST",
            url: "../ajax/set_profile.php",
            data: {
                change_profile: 1,
                avatarusers: avatarusers,
                nameadmin: nameadmin,
                oldpwd: oldpwd,
				newpwd: newpwd,
				newpwd2: newpwd2
            },
            success: function(response) {
                layer.close(ii);
                if (response.indexOf('Thay đổi thông tin thành công') !== -1) {
					layer.confirm(response, {
                        icon: 1,
                        btn: ['Xác nhận']
                    }, function() {
                        window.location.reload();
                    });
                } else {
                    layer.alert(response, { icon: 2 });
                }
            },
            error: function(xhr, status, error) {
                layer.msg('Lỗi máy chủ');
                return false;
            }
        });
    });
});
// Xóa cmt
function XoaBinhLuan(element) {
    var id = $(element).data('id');
    layer.confirm('Bạn có chắc là xóa bình luận này?', {
        icon: 3,
        btn: ['Đồng ý', 'Đóng']
    }, function(index) {
        layer.close(index);
        var loadingIndex = layer.msg('Đang tiến hành xóa...', { icon: 16, shade: 0.3, time: 0 });
        $.ajax({
            url: "../ajax/xoa_binhluan.php",
            type: "POST",
            data: { id: id },
            success: function(response) {
                layer.close(loadingIndex);
                if (response === "success") {
                    $(element).closest('tr').remove();
                    location.reload();
                } else {
                    layer.msg(response);
                }
            },
            error: function(xhr, status, error) {
                layer.close(loadingIndex);
                layer.msg('Lỗi máy chủ');
            }
        });
    }, function() {
    });
}
// Sửa hồ sơ
$(document).ready(function() {
    $("#td-sua-binhluan").submit(function(event) {
        event.preventDefault(); 
        var sua_avatar = $("#sua_avatar").val();
        var sua_hovaten = $("#sua_hovaten").val();
        var sua_noidung = $("#sua_noidung").val();
        var id_cmt = $("#id_cmt").val();
        $.ajax({
            type: "POST",
            url: "../ajax/sua_binhluan.php",
            data: {
                sua_binhluan: 1,
                sua_avatar: sua_avatar,
                sua_hovaten: sua_hovaten,
                sua_noidung: sua_noidung,
                id_cmt: id_cmt
            }, 
            success: function(response) {
                layer.msg(response);
            },
            error: function(xhr, status, error) {
                layer.msg('Lỗi máy chủ');
                console.log(error);
            }
        });
    });
});
// Banned cmt
$(document).ready(function () {
    $(".banned_cmts").click(function () {
        var id = $(this).data('id');
        var button = $(this);
        if (button.prop('disabled')) {
            return;
        }
        button.prop('disabled', true); 
        $.ajax({
            type: "POST",
            url: "../ajax/banned_cmt.php",
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                button.prop('disabled', false);
                if (response.status === "success") {
                    var newStatusText = response.newStatus === '1' ? 'Đã khóa thành công!' : 'Đã mở khóa thành công!';
                    layer.msg(newStatusText);
				setTimeout(function(){window.location.reload();},1300);
                } else {
                    layer.msg('Thất bại: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                button.prop('disabled', false);
                layer.msg('Lỗi máy chủ');
            }
        });
    });
});
