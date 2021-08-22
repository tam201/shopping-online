function kiemTra() {
    var dem = 0;
    var regexsdt = /^(\+84|0)[0-9]{9}$/gm;
    var tenad = document.getElementById("tenad").value;
    var tkad = document.getElementById("tkad").value;
    var mkad = document.getElementById("mkad").value;
    var nsad = document.getElementById("nsad").value;
    var sdtad = document.getElementByname("sdtad").value;
    var errtenad = document.getElementById("err-tenad");
    if (tenad === 0) {
        errtenad.innerHTML = "Nhập tên Admin";
    } else {
        errtenad.innerHTML = "";
    }
    var errtkad = document.getElementById("err-tkad");
    if (tkad === 0) {
        errtkad.innerHTML = "Nhập tài khoản";
    } else {
        errtkad.innerHTML = "";
    }
    var errmkad = document.getElementById("err-mkad");
    if (mkad === 0) {
        errmkad.innerHTML = "Nhập mật khẩu";
    } else {
        errmkad.innerHTML = "";
    }
    var errnsad = document.getElementById("err-nsad");
    if (nsad === 0) {
        errnsad.innerHTML = "Nhập Ngày Sinh";
    } else {
        errnsad.innerHTML = "";
    }
    var errsdtad = document.getElementById("err-sdtad");
    var checksdt = regexsdt.test(sdt);
    if (checksdt) {
        errsdtad.innerHTML = "";
        dem++;
    } else {
        errsdtad.innerHTML = "Nhập lại sdt";
    }
}
